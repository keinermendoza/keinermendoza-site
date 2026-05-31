const commonClassName = "selectable-image"
/*
interface ImageData {
    id: numeric
    name: string
    path: string
    publicImage: string
}
*/


function createImageSquare(ImageData) {

    const div = document.createElement("div")
    const elementId = "image-square-" + ImageData.id
    div.innerHTML = `
    <figure id="${elementId}" class="${commonClassName} w-full p-4 rounded-md bg-slate-600 text-white">
        <img class="object-cover w-full h-full" src="${ImageData.publicImage}" alt="${ImageData.name}" />
        <figcaption>${ImageData.name}<figcaption>
    </figure>
    `;
    div.onclick = () => {
        const event = new CustomEvent("onSelectImage", {detail: {publicImage: ImageData.publicImage,  src: ImageData.path, origin:elementId}})
        document.dispatchEvent(event)
    }
    return div;
}

export async function renderImages(parentElement, imageDataCollection) {
    parentElement.innerHTML = "";
    imageDataCollection.forEach(image => {
        const square = createImageSquare(image);
        parentElement.appendChild(square)
    });
}

export async function getData(endpoint) {
    try {
        const resp = await fetch(endpoint);
        const data = await resp.json()
        return data;
    } catch (e) {
        renderTemporalMessage("Não foi possivel obter as imagens");
    }
}

export function updateSelection(inputElement, eventDetail, previewElement) {
    updateInput(inputElement, eventDetail.src);
    if (previewElement) {
        updatePreviewElement(previewElement, eventDetail.publicImage)
    }
    selectSquareElement(eventDetail.origin)
}

function updatePreviewElement(previewElement, src) {
    previewElement.src = src
}

function selectSquareElement(elementId) {
    const selectedClasses = "border border-solid border-green-300"
    const selectedElement = document.getElementById(elementId)
    if (selectedElement) {
        const squareCollection = document.querySelectorAll("." + commonClassName)
        squareCollection.forEach(element => {
            element.classList.remove(...selectedClasses.split(" "))
        })
        selectedElement.classList.add(...selectedClasses.split(" "))
    }
}

function updateInput(inputElement, value) {
    inputElement.value = value;
}

async function storeImage(formElement, endpoint) {
    const data = new FormData(formElement)

    try {
        const response = await fetch(endpoint, {
            method: "POST",
            body: data,
            headers: {
                "Accept": "application/json"
            }
        });

        const result = await response.json();

        if (!response.ok) {
            if (result.message) {
                renderTemporalMessage(result.message)
            } else {
                renderTemporalMessage("erro no servidor, não foi possivel processar a imagem")
            }
        } else {
            renderTemporalMessage("trigger message success", false)
            return true
        }

    } catch (error) {
        renderTemporalMessage("Show message error, no fue posible subir imagem")
    }
}

export async function handleAddImage(formElement, endpoint) {
    formElement.addEventListener("submit", async (e) => {
        e.preventDefault()
        const sucess = await storeImage(formElement, endpoint)
        if (sucess){
            e.target.reset();
            const event = new CustomEvent("refetchData")
            document.dispatchEvent(event)
        }
    })
}

function renderTemporalMessage(message, isError = true) {
    const div = document.createElement("div")
    div.style = `padding: 10px 16px; background-color: ${isError ? 'rgb(239 68 68)' : 'rgb(21 128 61}'}; position:fixed; z-index:99999999; bottom:24px; right:24px; border-radius:6px;`
    div.innerHTML = `
        <p class="text-white">${message}</p>
    `;

    // adicionar mensagem ao body
    document.body.appendChild(div)

    setTimeout(() => {
        div.remove()
    }, 5000)



}
