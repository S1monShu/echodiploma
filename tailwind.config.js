/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./index.html",
        "./resources/js/**/*.{vue,js,ts,jsx,tsx}",
    ],
    theme: {
        extend: {
            backgroundImage: {
                'background-modal': "url('/resources/images/Background-modal.svg')",
                'add-song': "url('/resources/images/Add_song_modal.svg')",
            }
        },
    },
    plugins: [],
}
