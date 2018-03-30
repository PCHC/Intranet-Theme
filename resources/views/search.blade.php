@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  @include('partials.search-form')

  <hr />

  @if (!have_posts())
    <div class="alert alert-warning">
      {{  __('Sorry, no results were found.', 'sage') }}
    </div>
  @endif

  @while(have_posts()) @php(the_post())
    @include('partials.content')
  @endwhile

  {!! get_the_posts_navigation() !!}
@endsection
