// any CSS you import will output into a single css file (app.css in this case)
import "./styles/app.css";

// start the Stimulus application
import "./bootstrap";

import { h, render } from "preact";

function App() {
  return <h1>Bonjour, DAVID LA FARGE POKEMON !</h1>;
}

render(App(), document.getElementById("app"));
