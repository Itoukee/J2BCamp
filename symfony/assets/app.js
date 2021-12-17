/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import "./styles/app.css";

// start the Stimulus application
import "./bootstrap";

import React from "react";
import ReactDOM from "react-dom";

function showRegister() {
  const element = <p></p>;
  const div = document.getElementById("app");

  ReactDOM.render(element, div);
}

function showBills() {
  const element = "";
  const div = document.getElementById("app");

  ReactDOM.render(element, div);
}

function showAdmin() {
  const element = "";
  const div = document.getElementById("app");

  ReactDOM.render(element, div);
}

function showMessenger() {
  const element = "";
  const div = document.getElementById("app");

  ReactDOM.render(element, div);
}

showRegister();
