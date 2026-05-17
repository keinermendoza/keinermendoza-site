{{-- <section class="skills-section">
    <div class="section-wrapper "> --}}
    
        {{-- <h2 class="h2 title">Minhas principais ferramentas</h2>
        
        <div class="skill-gallery">
            @foreach ($skills as $skill)
                <div class="skill">
                    <img width="80" class="image" src="{{ $skill->image_url }}" alt="logotipo da tenología {{ $skill->title }}">
                    <h3 class="title">{{$skill->title}}</h3>
                </div>
            @endforeach
        </div> --}}
        
<section class="section-wrapper ">
        
<div id="skills">
  <div class="container">

    <!-- HEADER -->
    <div class="header">
      <span>Tech Stack</span>
      <h2>Minhas principais ferramentas</h2>
    </div>

    <!-- GRID -->
    <div class="skills-grid">
    @foreach ($skills as $skill)
      <div class="skill-card card">
        <div class="icon-box">
          <img src="{{ $skill->image_url }}" alt="{{ $skill->title }} Logo">
        </div>
        <h3>{{$skill->title}}</h3>
        <p>{{$skill->description}}</p>
      </div>
    @endforeach


    </div>
  </div>
</div>
<section/>