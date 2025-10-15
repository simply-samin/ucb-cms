<?php

namespace App\Filament\Pages;

use App\Enums\NavigationGroup;
use App\Models\Footer;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
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

    protected static string | UnitEnum | null $navigationGroup = NavigationGroup::SiteStructure;
    
    protected static ?int $navigationSort = 2;

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
                    FileUpload::make('logo')
                        ->label('Footer Logo')
                        ->directory('footers')
                        ->image()
                        ->maxSize(2048)
                        ->helperText('Upload the footer logo (max 2MB).'),

                    RichEditor::make('description')
                        ->label('Footer Description')
                        ->placeholder('A short description or about text...')
                        ->toolbarButtons([
                            'bold',
                            'italic',
                            'link',
                            'bulletList',
                            'orderedList',
                            'underline',
                        ]),

                    Textarea::make('head_office_address')
                        ->label('Head Office Address')
                        ->placeholder('Enter head office address...')
                        ->rows(3),

                    TextInput::make('support_email')
                        ->label('Support Email')
                        ->placeholder('support@example.com')
                        ->email(),

                    TextInput::make('hotline')
                        ->label('Hotline')
                        ->placeholder('+880 9612 112233'),

                    Repeater::make('links')
                        ->label('Footer Links')
                        ->schema([
                            TextInput::make('label')
                                ->label('Label')
                                ->placeholder('About Us')
                                ->required(),

                            TextInput::make('link')
                                ->label('URL')
                                ->placeholder('/about')
                                ->required(),
                        ])
                        ->columns(2)
                        ->collapsible()
                        ->orderColumn()
                        ->addActionLabel('Add Link'),

                    Repeater::make('social_links')
                        ->label('Social Media Links')
                        ->schema([
                            TextInput::make('platform')
                                ->label('Platform')
                                ->placeholder('Facebook')
                                ->required(),

                            TextInput::make('link')
                                ->label('Profile URL')
                                ->placeholder('https://facebook.com/...'),
                                
                            Select::make('icon')
                                ->label('Icon')
                                ->options([
                                    'facebook' => 'Facebook',
                                    'linkedin' => 'LinkedIn',
                                    'instagram' => 'Instagram',
                                    'youtube' => 'YouTube',
                                    'x' => 'X',
                                ])
                                ->placeholder('Select Icon'),
                        ])
                        ->columns(3)
                        ->collapsible()
                        ->orderColumn()
                        ->addActionLabel('Add Social Link'),

                    Repeater::make('mobile_apps')
                        ->label('Mobile App Links')
                        ->schema([
                            TextInput::make('platform')
                                ->label('Platform')
                                ->placeholder('App Store'),

                            TextInput::make('link')
                                ->label('URL')
                                ->placeholder('https://apps.apple.com/...'),

                            FileUpload::make('icon')
                                ->label('App Icon')
                                ->directory('footers/apps')
                                ->image()
                                ->maxSize(1024),
                        ])
                        ->columns(3)
                        ->collapsible()
                        ->orderColumn()
                        ->addActionLabel('Add Mobile App'),

                    TextInput::make('copyright_text')
                        ->label('Copyright Text')
                        ->placeholder('© 2025 UCB. All rights reserved.')
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