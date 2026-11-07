/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ['./*.php', './inc/**/*.php', './templates/**/*.php'],
    corePlugins: {
        preflight: false,
    },
    theme: {
        extend: {
            colors: {
                primary: '#86c841',
                'primary-dark': '#6fa832',
                dark: '#222222',
            },
        },
    },
    plugins: [],
};
