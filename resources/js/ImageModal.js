import { renderImages, getData, updateSelection, handleAddImage } from "./utilities";

const appEntrypoint = document.getElementById("customModal");
if (appEntrypoint) {
    const getEndpoint = appEntrypoint.dataset.getendpoint
    const postEndpoint = appEntrypoint.dataset.getendpoint

    const input = document.getElementById(appEntrypoint.dataset.input)

    if (input) {
        const galleryElement = appEntrypoint.querySelector("#custom-modal-gallery")
        const formElement = appEntrypoint.querySelector("#custom-modal-form")
        const previewElement = document.getElementById(appEntrypoint.dataset.imagepreview)
        const images = await getData(getEndpoint)
        renderImages(galleryElement, images)

        handleAddImage(formElement, postEndpoint)

        document.addEventListener("onSelectImage", (e) => {
            updateSelection(input, e.detail, previewElement)
        })

        document.addEventListener("refetchData", async () => {
            const newImages = await getData(getEndpoint)
            renderImages(galleryElement, newImages)
        })
    }

}
