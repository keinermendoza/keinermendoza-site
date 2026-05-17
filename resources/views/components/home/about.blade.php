<section id="about">

  <x-section-wrapper>
    {{-- <h2 class="h2 mb-3">Sobre Mi</h2>
    <p class="mb-3">
        Sou venezuelano e resido no Brasil desde 2022. Falo espanhol e português, e tenho capacidade de compreender documentação técnica em inglês. Atualmente estou cursando o segundo semestre de Análise e Desenvolvimento de Sistemas.
    </p>
    <p>
        Meu foco está no desenvolvimento backend com <strong>PHP, Laravel e MySQL</strong>, priorizando a criação de aplicações bem estruturadas e eficientes. Além disso, já desenvolvi projetos utilizando <strong>Python</strong> para web.
    </p>
     --}}

  <div class="about-content">
    
    <!-- LEFT -->
    <div class="about-left">
      
      <div class="heading">
        <span class="subtitle">Perfil</span>
        <h2 class="h2">Sobre Mi</h2>
      </div>

      <div class="stats">
        
        <div class="stat">
          <svg class="icon" width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 10C8.55 10 9.02083 9.80417 9.4125 9.4125C9.80417 9.02083 10 8.55 10 8C10 7.45 9.80417 6.97917 9.4125 6.5875C9.02083 6.19583 8.55 6 8 6C7.45 6 6.97917 6.19583 6.5875 6.5875C6.19583 6.97917 6 7.45 6 8C6 8.55 6.19583 9.02083 6.5875 9.4125C6.97917 9.80417 7.45 10 8 10V10M8 17.35C10.0333 15.4833 11.5417 13.7875 12.525 12.2625C13.5083 10.7375 14 9.38333 14 8.2C14 6.38333 13.4208 4.89583 12.2625 3.7375C11.1042 2.57917 9.68333 2 8 2C6.31667 2 4.89583 2.57917 3.7375 3.7375C2.57917 4.89583 2 6.38333 2 8.2C2 9.38333 2.49167 10.7375 3.475 12.2625C4.45833 13.7875 5.96667 15.4833 8 17.35V17.35M8 20C5.31667 17.7167 3.3125 15.5958 1.9875 13.6375C0.6625 11.6792 0 9.86667 0 8.2C0 5.7 0.804167 3.70833 2.4125 2.225C4.02083 0.741667 5.88333 0 8 0C10.1167 0 11.9792 0.741667 13.5875 2.225C15.1958 3.70833 16 5.7 16 8.2C16 9.86667 15.3375 11.6792 14.0125 13.6375C12.6875 15.5958 10.6833 17.7167 8 20V20M8 8V8V8V8V8V8V8V8V8V8" fill="#0058BE"/>
          </svg>

          <p class="label">Localização</p>
          <p class="value">Brasil (S desde 2022)</p>
        </div>

        <div class="stat">
            <svg class="icon" width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11 18L4 14.2V8.2L0 6L11 0L22 6V14H20V7.1L18 8.2V14.2L11 18V18M11 9.7L17.85 6L11 2.3L4.15 6L11 9.7V9.7M11 15.725L16 13.025V9.25L11 12L6 9.25V13.025L11 15.725V15.725M11 9.7V9.7V9.7V9.7V9.7V9.7M11 11.95V11.95V11.95V11.95V11.95V11.95V11.95V11.95V11.95V11.95M11 11.95V11.95V11.95V11.95V11.95V11.95V11.95V11.95V11.95V11.95" fill="#0058BE"/>
            </svg>

          <p class="label">Formação</p>
          <p class="value">ADS (2º Semestre)</p>
        </div>

        <div class="stat">
          <svg class="icon" width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.9 20L15.45 8H17.55L22.1 20H20L18.925 16.95H14.075L13 20H10.9V20M3 17L1.6 15.6L6.65 10.55C6.06667 9.96667 5.5375 9.3 5.0625 8.55C4.5875 7.8 4.15 6.95 3.75 6H5.85C6.18333 6.65 6.51667 7.21667 6.85 7.7C7.18333 8.18333 7.58333 8.66667 8.05 9.15C8.6 8.6 9.17083 7.82917 9.7625 6.8375C10.3542 5.84583 10.8 4.9 11.1 4H0V2H7V0H9V2H16V4H13.1C12.75 5.2 12.225 6.43333 11.525 7.7C10.825 8.96667 10.1333 9.93333 9.45 10.6L11.85 13.05L11.1 15.1L8.05 11.975L3 17V17M14.7 15.2H18.3L16.5 10.1L14.7 15.2V15.2" fill="#0058BE"/>
          </svg>
          <p class="label">Idiomas</p>
          <p class="value">Espanhol, Português, Inglês (Técnico)</p>
        </div>

        <div class="stat">
          <svg class="icon" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2 16C1.45 16 0.979167 15.8042 0.5875 15.4125C0.195833 15.0208 0 14.55 0 14V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H18C18.55 0 19.0208 0.195833 19.4125 0.5875C19.8042 0.979167 20 1.45 20 2V14C20 14.55 19.8042 15.0208 19.4125 15.4125C19.0208 15.8042 18.55 16 18 16H2V16M2 14H18V14V14V4H2V14V14V14V14M5.5 13L4.1 11.6L6.675 9L4.075 6.4L5.5 5L9.5 9L5.5 13V13M10 13V11H16V13H10V13" fill="#0058BE"/>
          </svg>
          <p class="label">Foco</p>
          <p class="value">PHP, Laravel, MySQL</p>
        </div>

      </div>
    </div>

    <!-- RIGHT -->
    <div class="about-right">
      <p>
        Sou venezuelano e resido no Brasil desde 2022. Falo espanhol e português, e tenho capacidade de compreender documentação técnica em inglês. Atualmente estou cursando o segundo semestre de Análise e Desenvolvimento de Sistemas.
      </p>
      <p>
        Meu foco está no desenvolvimento backend com <strong>PHP, Laravel e MySQL</strong>, priorizando a criação de aplicações bem estruturadas e eficientes. Além disso, já desenvolvi projetos utilizando <strong>Python</strong> para web.
      </p>
      </div>
    </div>

  </div>
</x-section-wrapper>
</section>