<div class="container mx-auto max-w-xl py-8">
    <h1 class="text-2xl font-bold mb-6">
        Formulario de Contacto
    </h1>

    <div id="success-message" class="hidden mb-4 rounded bg-green-100 p-3 text-green-700"></div>
    <div id="error-message" class="hidden mb-4 rounded bg-red-100 p-3 text-red-700"></div>

    <form id="contact-form">
        @csrf
        <div class="mb-4">
            <label for="email">Email</label>

            <input
                id="email"
                name="email"
                type="email"
                class="w-full rounded border p-2"
                required
            >
        </div>

        <div class="mb-4">
            <label for="phone">Numero de Telefone</label>

            <input
                id="phone"
                name="phone"
                type="text"
                class="w-full rounded border p-2"
                required
            >
        </div>
        <div class="mb-4">
            <label for="content">Mensagem</label>

            <textarea
                id="content"
                name="content"
                rows="5"
                class="w-full rounded border p-2"
                required
            ></textarea>
        </div>

        <button
            id="submit-button"
            class="rounded bg-blue-600 px-4 py-2 text-white"
        >
            Enviar
        </button>

    </form>

</div>

<script>

const form = document.getElementById('contact-form');
const submitButton = document.getElementById('submit-button');
const success = document.getElementById('success-message');
const error = document.getElementById('error-message');

form.addEventListener('submit', async (e) => {
    e.preventDefault();

    success.classList.add('hidden');
    error.classList.add('hidden');

    submitButton.disabled = true;
    submitButton.textContent = 'Enviando...';

    const formData = new FormData(form);

    try {
        const response = await fetch('{{ route("message.store") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json',
            },
            body: formData
        });

        if (!response.ok) {
            throw data;
        }

        success.textContent = 'Mensaje enviado correctamente.';
        success.classList.remove('hidden');

        form.reset();

    } catch (err) {

        let message = 'Teve um error.';

        if (err.errors) {
            message = Object.values(err.errors)
                .flat()
                .join('\n');
        } else if (err.message) {
            message = err.message;
        }

        error.textContent = message;
        error.classList.remove('hidden');

    } finally {
        submitButton.disabled = false;
        submitButton.textContent = 'Enviar';
    }

});

</script>
