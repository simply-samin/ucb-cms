<?php

namespace App\Filament\Pages;

use App\Enums\NavigationGroup;
use App\Models\NavigationBar;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions as SchemaActions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;
use UnitEnum;

/**
 * @property-read Schema $form
 */
class ManageNavigationBar extends Page
{

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedBars3;

    protected static ?string $navigationLabel = 'Navigation Bar';

    protected static string | UnitEnum | null $navigationGroup = NavigationGroup::SiteStructure;
    
    protected static ?int $navigationSort = 1;

    protected string $view = 'filament.pages.manage-navigation-bar';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->getRecord()?->attributesToArray() ?? []);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([
                    FileUpload::make('brand_logo')
                        ->label('Brand Logo')
                        ->directory('navigation')
                        ->disk('public')
                        ->visibility('public')
                        ->imageEditor()
                        ->imagePreviewHeight('160')
                        ->openable()
                        ->downloadable(),

                    TextInput::make('brand_name')
                        ->label('Brand Name')
                        ->placeholder('UCB')
                        ->maxLength(255),

                    Repeater::make('menu_items')
                        ->label('Menu Items')
                        ->schema([
                            TextInput::make('label')
                                ->label('Label')
                                ->required(),
                            TextInput::make('link')
                                ->label('Link')
                                ->placeholder('/about')
                                ->required(),
                        ])
                        ->addActionLabel('Add Menu Item')
                        ->collapsible()
                        ->columns(2)
                        ->defaultItems(3)
                        ->columnSpanFull(),

                    TextInput::make('cta_text')
                        ->label('CTA Button Text')
                        ->placeholder('Explore Cards')
                        ->maxLength(255),

                    TextInput::make('cta_link')
                        ->label('CTA Button Link')
                        ->placeholder('https://example.com')
                        ->maxLength(255),
                ])
                    ->columns(2)
                    ->livewireSubmitHandler('save')
                    ->footer([
                        SchemaActions::make([
                            Action::make('save')
                                ->submit('save')
                                ->keyBindings(['mod+s']),
                        ]),
                    ]),
            ])
            ->record($this->getRecord())
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $record = $this->getRecord() ?? new NavigationBar();

        // Replace old logo if a new one is uploaded
        if (
            isset($data['brand_logo'])
            && $record->brand_logo
            && $data['brand_logo'] !== $record->brand_logo
        ) {
            $disk = Storage::disk('public');
            if ($disk->exists($record->brand_logo)) {
                $disk->delete($record->brand_logo);
            }
        }

        // Remove file when cleared
        if (empty($data['brand_logo']) && $record->brand_logo) {
            Storage::disk('public')->delete($record->brand_logo);
            $record->brand_logo = null;
        }

        $record->fill($data);
        $record->save();

        if ($record->wasRecentlyCreated) {
            $this->form->record($record)->saveRelationships();
        }

        Notification::make()
            ->success()
            ->title('Navigation bar saved successfully!')
            ->send();
    }

    public function getRecord(): ?NavigationBar
    {
        return NavigationBar::query()->first();
    }
}