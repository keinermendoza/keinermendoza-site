@props([
    "links"
])

<nav>
  <div class="wrapper">

    <div class="logo">
        <a href="/#hero">
            <x-application-logo />
            <span>Keiner Mendoza</span>
        </a>
    </div>

    <input type="radio" name="slider" id="menu-btn">
    <input type="radio" name="slider" id="close-btn">

    <ul class="nav-links">
      <label for="close-btn" class="btn close-btn">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
      </svg>
      </label>

        @foreach ($links as $link)
        <li><a class="nav-anchor" href="{{ $link['ref'] }}">{{ $link['text'] }}</a></li>
        @endforeach

      <li><ShareBtn /></li>

    </ul>
    <label for="menu-btn" class="btn menu-btn">
      <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
      </svg>
    </label>
  </div>
</nav>

<script>
  document.addEventListener('DOMContentLoaded', closeMobileNavabarOnClickItem);

  function closeMobileNavabarOnClickItem() {
    const closeRadioBtn = document.getElementById('close-btn');
    document.querySelectorAll('.nav-anchor').forEach(anchor  => {
        anchor.onclick = () => closeRadioBtn.checked = true;
    });
  }
</script>
