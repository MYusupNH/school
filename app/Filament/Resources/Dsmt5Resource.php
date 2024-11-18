<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Dsmt5;
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
use App\Filament\Resources\Dsmt5Resource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Dsmt5Resource\RelationManagers;

class Dsmt5Resource extends Resource
{
    protected static ?string $model = Dsmt5::class;

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
                        TextInput::make('dwaktu'),
                        TextInput::make('dibadah'),
                        TextInput::make('dbelajar'),
                        TextInput::make('dbergaul'),
                        TextInput::make('dberbusana'),
                        TextInput::make('dmenggunakanfasilitas'),
                        TextInput::make('dk3'),
                        TextInput::make('dberbahasa'),
                         TextInput::make('dbertindak'),
                        TextInput::make('dkeamanan'),
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
            TextColumn::make('dwaktu'),
            TextColumn::make('dibadah'),
            TextColumn::make('dbelajar'),
            TextColumn::make('dbergaul'),
            TextColumn::make('dberbusana'),
            TextColumn::make('dmenggunakanfasilitas'),
            TextColumn::make('dk3'),
            TextColumn::make('dberbahasa'),
            TextColumn::make('dbertindak'),
            TextColumn::make('dkeamanan'),
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
            'index' => Pages\ListDsmt5s::route('/'),
            'create' => Pages\CreateDsmt5::route('/create'),
            'edit' => Pages\EditDsmt5::route('/{record}/edit'),
        ];
    }
}