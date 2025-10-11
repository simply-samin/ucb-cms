<?php

namespace App\Filament\Pages;

use App\Models\HighlightSection;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
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
class ManageHighlightSection extends Page
{
    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedSparkles;
    protected static ?string $navigationLabel = 'Highlight Section';
    protected static string | UnitEnum | null $navigationGroup = 'Landing Page';
    protected static ?int $navigationSort = 2;

    protected string $view = 'filament.pages.manage-highlight-section';

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
                    TextInput::make('tagline_text')
                        ->label('Tagline Text')
                        ->placeholder('Not Just A Swipe')
                        ->maxLength(255)
                        ->required()
                        ->columnSpanFull(),

                    TextInput::make('main_heading')
                        ->label('Main Heading')
                        ->placeholder('A Gateway to Lasting Memories')
                        ->maxLength(255)
                        ->required()
                        ->columnSpanFull(),

                    FileUpload::make('background_image')
                        ->label('Background Image')
                        ->directory('highlight')
                        ->disk('public')
                        ->visibility('public')
                        ->imageEditor()
                        ->imagePreviewHeight('200')
                        ->openable()
                        ->downloadable(),

                    TextInput::make('primary_cta_text')
                        ->label('Primary CTA Text')
                        ->placeholder('Explore Cards')
                        ->maxLength(255),

                    TextInput::make('primary_cta_link')
                        ->label('Primary CTA Link')
                        ->placeholder('https://example.com/cards')
                        ->maxLength(255),

                    TextInput::make('secondary_cta_text')
                        ->label('Secondary CTA Text')
                        ->placeholder('Dial Us')
                        ->maxLength(255),

                    TextInput::make('secondary_cta_link')
                        ->label('Secondary CTA Link')
                        ->placeholder('tel:123456')
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
        $record = $this->getRecord() ?? new HighlightSection();

        // Replace old background if a new image uploaded
        if (
            isset($data['background_image'])
            && $record->background_image
            && $data['background_image'] !== $record->background_image
        ) {
            $disk = Storage::disk('public');
            if ($disk->exists($record->background_image)) {
                $disk->delete($record->background_image);
            }
        }

        // Handle remove case (if field cleared)
        if (empty($data['background_image']) && $record->background_image) {
            Storage::disk('public')->delete($record->background_image);
            $record->background_image = null;
        }

        $record->fill($data);
        $record->save();

        if ($record->wasRecentlyCreated) {
            $this->form->record($record)->saveRelationships();
        }

        Notification::make()
            ->success()
            ->title('Highlight section saved successfully!')
            ->send();
    }

    public function getRecord(): ?HighlightSection
    {
        return HighlightSection::query()->first();
    }
}