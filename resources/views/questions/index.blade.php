<!-- resources/views/questions/index.blade.php -->

@extends('layouts.app')

@section('content')

<h1>Liste des Questions</h1>

@if(count($questions) > 0)
    <ul>
        @foreach($questions as $question)
            <li>
                <strong>{{ $question->question }}</strong>
                <p>Type : {{ $question->type }}</p>
                
                @if($question->type == 'choix_multiple' || $question->type == 'choix_unique')
                    <p>Propositions :</p>
                    <ul>
                        @foreach($question->options as $option)
                            <li>{{ $option }}</li>
                        @endforeach
                    </ul>
                @elseif($question->type == 'reponse_texte')
                    <p>Réponse Attendue : {{ $question->reponse_texte }}</p>
                @endif

                @if($question->type == 'choix_unique')
                    <p>Note : {{ $question->note }}</p>
                @endif
            </li>
        @endforeach
    </ul>
@else
    <p>Aucune question disponible pour le moment.</p>
@endif

@endsection
