<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Ksmt4;
use App\Models\Student;
use Filament\Forms\Form;
use App\Models\Classroom;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Ksmt4Resource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Ksmt4Resource\RelationManagers;

class Ksmt4Resource extends Resource
{
    protected static ?string $model = Ksmt4::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Select::make('student_id')
                        ->options(Student::all()->pluck('name', 'id'))
                        ->label('Murid'),
                    Select::make('classroom_id')
                        ->options(Classroom::all()->pluck('name', 'id'))
                        ->label('Kelas'),
                        TextInput::make('bd'),
                        TextInput::make('pbt'),
                        TextInput::make('pw'),
                        TextInput::make('ppb'),
                        TextInput::make('pkk'),
                        TextInput::make('kb'),
                        //TextInput::make('profesi'),
                        //TextInput::make('pemtur'),
                       // TextInput::make('pbo'),
                        //TextInput::make('gim'),
                        ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.name')
                ->label('Murid'),
            TextColumn::make('classroom.name')
                ->label('Kelas'),
            TextColumn::make('bd'),
            TextColumn::make('pbt'),
            TextColumn::make('pw'),
            TextColumn::make('ppb'),
            TextColumn::make('pkk'),
            TextColumn::make('kb'),
            //TextColumn::make('profesi'),
            //TextColumn::make('pemtur'),
           // TextColumn::make('pbo'),
            //TextColumn::make('gim'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('classroom_id')
                ->options(Classroom::all()->pluck('name', 'id'))
                ->label('Filter Kelas'),        
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKsmt4s::route('/'),
            'create' => Pages\CreateKsmt4::route('/create'),
            'edit' => Pages\EditKsmt4::route('/{record}/edit'),
        ];
    }
}