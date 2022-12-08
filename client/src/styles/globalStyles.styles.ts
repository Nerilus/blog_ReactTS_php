import { createGlobalStyle } from "styled-components";

export const GlobalStyle = createGlobalStyle`
    *,
    *::after,
    *::before {
        box-sizing: border-box;
        margin: 0;
    }
    body {
        background: white;
        color: black;
        font-family: 'Roboto', monospace;
        letter-spacing: .6px;
    }
`;
