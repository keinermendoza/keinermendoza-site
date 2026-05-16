<section>
    <h1>{{$project->title}}</h1>
    <img src="{{ asset('storage/' . $project->image); }}" alt="imagem de projeto {{ $project->title }}">
    <x-ui.form-image endpoint="{{ route('projects.update', $project->id) }}" />

</section>