<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use FilamentAddons\Forms\Fields\PasswordGenerator;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $label = 'User';

    protected static ?string $navigationGroup = 'Filament Shield';

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set, $livewire) {
                                if ($livewire instanceof CreateUser) {
                                    return $set('slug', Str::slug($state));
                                }
                            }),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(User::class, 'slug', fn ($record) => $record),
                        Forms\Components\TextInput::make('email')
                            ->required()
                            ->email()
                            ->unique(User::class, 'email', fn ($record) => $record),
                        Forms\Components\Toggle::make('reset_password')
                            ->columnSpan('full')
                            ->reactive()
                            ->dehydrated(false)
                            ->hiddenOn('create'),
                        PasswordGenerator::make('password')
                            ->columnSpan('full')
                            ->visible(fn ($livewire, $get) => $livewire instanceof CreateUser || $get('reset_password') == true)
                            ->rules(config('filament-breezy.password_rules', 'max:8'))
                            ->required()
                            ->dehydrateStateUsing(function ($state) {
                                return Hash::make($state);
                            }),
                        Forms\Components\CheckboxList::make('roles')
                            ->columnSpan('full')
                            ->relationship('roles', 'name', function (Builder $query) {
                                if (! auth()->user()->hasRole('super_admin')) {
                                    return $query->where('name', '<>', 'super_admin');
                                }

                                return $query;
                            })
                            ->getOptionLabelFromRecordUsing(function ($record) {
                                return Str::of($record->name)->headline();
                            })
                            ->columns(4),
                        TiptapEditor::make('bio')
                            ->profile('barebone')
                            ->columnSpan(['sm' => 2]),
                    ])->columns(['md' => 2]),
                Forms\Components\Section::make('Social')
                    ->schema([
                        Forms\Components\Group::make()->schema([
                            Forms\Components\TextInput::make('facebook_handle'),
                            Forms\Components\TextInput::make('twitter_handle'),
                            Forms\Components\TextInput::make('instagram_handle'),
                            Forms\Components\TextInput::make('linkedin_handle'),
                            Forms\Components\TextInput::make('youtube_handle'),
                            Forms\Components\TextInput::make('pinterest_handle'),
                        ])->columns(2)->columnSpan(['sm' => 2]),
                    ]),
                Forms\Components\Section::make('Permissions')
                    ->description('Users with roles have permission to completely manage resources based on the permissions set under the Roles Menu. To limit a user\'s access to specific resources disable thier roles and assign them individual permissions below.')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Forms\Components\CheckboxList::make('permissions')
                            ->columnSpan('full')
                            ->relationship('permissions', 'name')
                            ->getOptionLabelFromRecordUsing(function ($record) {
                                return Str::of($record->name)->replace('::', ' ')->headline();
                            })
                            ->columns(['md' => 2, 'lg' => 3]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('roles.name')
                    ->formatStateUsing(function ($state) {
                        return Str::of($state)->headline();
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('roles')->relationship('roles', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->iconButton(),
                Tables\Actions\DeleteAction::make()->iconButton(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('name', 'asc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }

    public static function getPermissions()
    {
        $permissions = Permission::get();
        $groups = [];

        $permissions->map(function ($p) {
            $name = explode(' ', $p->name);
        });
    }
}
