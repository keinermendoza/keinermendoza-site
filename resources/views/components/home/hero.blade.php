
<header class="hero" id="hero">
    <div class="hero-wrapper">
        <div class="hero-content">

            <div class="hero-texts">
                <h1 class="title-page">
                    <span class="my-name">Keiner Mendoza</span>
                    <br>
                    Desenvolvedor web
                </h1>
                <p class="claim">
Estudante de Análise e Desenvolvimento de Sistemas, com experiência em projetos freelance utilizando Python, PHP, JavaScript e SQL.
                </p>
                <div class="call-to-action">


                    <a class="secondary-button"  aria-label="baixar curriculo do Keiner Mendoza"
                        download
                        href="{{ route('document.download_cv') }}"
                        >
                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.9558 1.1875C10.9558 0.530664 10.4251 0 9.76831 0C9.11147 0 8.58081 0.530664 8.58081 1.1875V10.1939L5.85698 7.47012C5.39312 7.00625 4.6398 7.00625 4.17593 7.47012C3.71206 7.93398 3.71206 8.6873 4.17593 9.15117L8.92593 13.9012C9.3898 14.365 10.1431 14.365 10.607 13.9012L15.357 9.15117C15.8208 8.6873 15.8208 7.93398 15.357 7.47012C14.8931 7.00625 14.1398 7.00625 13.6759 7.47012L10.9558 10.1939V1.1875ZM2.64331 13.0625C1.33335 13.0625 0.268311 14.1275 0.268311 15.4375V16.625C0.268311 17.935 1.33335 19 2.64331 19H16.8933C18.2033 19 19.2683 17.935 19.2683 16.625V15.4375C19.2683 14.1275 18.2033 13.0625 16.8933 13.0625H13.1267L11.4457 14.7436C10.5179 15.6713 9.01499 15.6713 8.08726 14.7436L6.40991 13.0625H2.64331ZM16.2996 15.1406C16.5358 15.1406 16.7623 15.2345 16.9293 15.4015C17.0964 15.5685 17.1902 15.795 17.1902 16.0312C17.1902 16.2675 17.0964 16.494 16.9293 16.661C16.7623 16.828 16.5358 16.9219 16.2996 16.9219C16.0634 16.9219 15.8368 16.828 15.6698 16.661C15.5028 16.494 15.4089 16.2675 15.4089 16.0312C15.4089 15.795 15.5028 15.5685 15.6698 15.4015C15.8368 15.2345 16.0634 15.1406 16.2996 15.1406Z" fill="white"/>
                        </svg>
                        Baixar CV
                    </a>
                    <a class="primary-button" href="#contato" aria-label="Entrar em contato">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        <span>
                            Contatar
                        </span>
                    </a>
                </div>
            </div>
            <img class="hero-image" src="{{ asset('images/profile.jpg') }}" alt="imagem de Keiner Mendoza">
        </div>
    </div>
</header>
