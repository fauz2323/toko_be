@extends('Layout.app')

@section('content')
    <div class="row">
        <livewire:card.home-card :name="'saldoku'" :amount="$bulanan" :icon="'ri-eye-line widget-icon'" />
        <livewire:card.home-card :name="'User Apps'" :amount="$user" :icon="'ri-eye-line widget-icon'" />
    </div>
@endsection
