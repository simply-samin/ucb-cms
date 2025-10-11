<?php

namespace App\Filament\Pages;

use App\Models\Footer;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions as SchemaActions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

/**
 * @property-read Schema $form
 */
class ManageFooter extends Page
{
    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedBars4;
    protected static ?string $navigationLabel = 'Footer';
    protected static string | UnitEnum | null $navigationGroup = 'Site Structure';
    protected static ?int $navigationSort = 4;

    protected string $view = 'filament.pages.manage-footer';

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
                    RichEditor::make('about_text')
                        ->label('About / Description')
                        ->placeholder('A short description or about text...'),

                    Repeater::make('links')
                        ->label('Footer Links')
                        ->schema([
                            TextInput::make('label')
                                ->label('Label')
                                ->required(),
                            TextInput::make('link')
                                ->label('URL')
                                ->placeholder('/about')
                                ->required(),
                        ])
                        ->columns(2)
                        ->collapsible()
                        ->addActionLabel('Add Link'),

                    Repeater::make('social_links')
                        ->label('Social Links')
                        ->schema([
                            TextInput::make('platform')
                                ->label('Platform')
                                ->placeholder('Facebook')
                                ->required(),
                            TextInput::make('link')
                                ->label('Link')
                                ->placeholder('https://facebook.com/...'),
                            TextInput::make('icon')
                                ->label('Icon Class')
                                ->placeholder('fa-brands fa-facebook'),
                        ])
                        ->columns(3)
                        ->collapsible()
                        ->addActionLabel('Add Social Link'),

                    TextInput::make('copyright_text')
                        ->label('Copyright Text')
                        ->placeholder('© 2025 UCB. All rights reserved.')
                        ->maxLength(255),
                ])
                    ->columns(1)
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
        $record = $this->getRecord() ?? new Footer();

        $record->fill($data);
        $record->save();

        if ($record->wasRecentlyCreated) {
            $this->form->record($record)->saveRelationships();
        }

        Notification::make()
            ->success()
            ->title('Footer updated successfully!')
            ->send();
    }

    public function getRecord(): ?Footer
    {
        return Footer::query()->first();
    }
}