/** @type {import('tailwindcss').Config} */
module.exports = {
    important: true,
    content: ['./**/*.php'],
    theme: {
        screens: {
            sm: '480px',
            md: '768px',
            lg: '976px',
            xl: '1441px',
        },
        extend: {},
    },
    plugins: [],
};
