import globals from 'globals';
import js from '@eslint/js';

export default [
    js.configs.recommended,
    {
        files: ['tailwind.config.js'],
        languageOptions: {
            sourceType: 'commonjs',
            globals: { ...globals.node },
        },
    },
    {
        // The legacy template scripts are kept as shipped.
        ignores: ['node_modules/', 'assets/legacy/', '**/*.min.js'],
    },
];
