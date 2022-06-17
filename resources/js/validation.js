function checkLength(string, length = 1, max = false) {
  if (max) {
    return string.length === length;
  } else {
    return string.length >= length;
  }
}

const btnSubmitRegister = document.getElementById("btn-submit-register");
const btnSubmitDishCreate = document.getElementById("btn-submit-dish-create");
const btnSubmitDishEdit = document.getElementById("btn-submit-dish-edit");

if (btnSubmitRegister) {
  btnSubmitRegister.addEventListener("click", (event) => {
    event.preventDefault();

    const form = document.getElementById("form");

    const errorDiv = document.getElementById("error");
    const errorMessage = document.getElementById("error-message");

    errorDiv.classList.add("d-none");
    errorMessage.innerHTML = "";

    const inputs = form.elements;
    const errors = [];

    if (!checkLength(inputs.name_restaurant.value.trim())) {
      errors.push("Il nome del ristorante è obbligatorio");
    }

    if (!checkLength(inputs.address.value.trim())) {
      errors.push("L'indirizzo è obbligatorio");
    }

    if (!checkLength(inputs.password.value.trim(), 8)) {
      errors.push(
        "La password è obbligatorio e deve essere almeno 8 caratteri"
      );
    }

    if (!checkLength(inputs.password_confirmation.value.trim(), 8)) {
      errors.push("La password va confermata");
    }

    if (!checkLength(inputs.vat_number.value.trim(), 11, true)) {
      errors.push("La Partita Iva è obbligatoria e di 11 caratteri");
    }

    if (
      !inputs.email.value.match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      )
    ) {
      errors.push("La mail è obbligatoria e deve essere una mail corretta");
    }

    if (errors.length) {
      errorMessage.innerHTML += "<ul>";
      errors.forEach((e) => {
        errorMessage.innerHTML += `<li>${e}</li>`;
      });
      errorMessage.innerHTML += "</ul>";

      errorDiv.classList.remove("d-none");
    } else {
      form.submit();
    }
  });
}

if (btnSubmitDishCreate) {
  btnSubmitDishCreate.addEventListener("click", (event) => {
    event.preventDefault();

    const form = document.getElementById("form");

    const errorDiv = document.getElementById("error");
    const errorMessage = document.getElementById("error-message");

    errorDiv.classList.add("d-none");
    errorMessage.innerHTML = "";

    const inputs = form.elements;
    const errors = [];

    if (!checkLength(inputs.name.value.trim())) {
      errors.push("Il nome è obbligatorio");
    }

    if (isNaN(inputs.price.value)) {
      errors.push("Il prezzo è obbligatorio");
    }

    if (errors.length) {
      errorMessage.innerHTML += "<ul>";
      errors.forEach((e) => {
        errorMessage.innerHTML += `<li>${e}</li>`;
      });
      errorMessage.innerHTML += "</ul>";

      errorDiv.classList.remove("d-none");
    } else {
      form.submit();
    }
  });
}

if (btnSubmitDishEdit) {
  btnSubmitDishEdit.addEventListener("click", (event) => {
    event.preventDefault();

    const form = document.getElementById("form");

    const errorDiv = document.getElementById("error");
    const errorMessage = document.getElementById("error-message");

    errorDiv.classList.add("d-none");
    errorMessage.innerHTML = "";

    const inputs = form.elements;
    const errors = [];

    if (!checkLength(inputs.name.value.trim())) {
      errors.push("Il nome è obbligatorio");
    }

    if (isNaN(inputs.price.value)) {
      errors.push("Il prezzo è obbligatorio");
    }

    if (errors.length) {
      errorMessage.innerHTML += "<ul>";
      errors.forEach((e) => {
        errorMessage.innerHTML += `<li>${e}</li>`;
      });
      errorMessage.innerHTML += "</ul>";

      errorDiv.classList.remove("d-none");
    } else {
      form.submit();
    }
  });
}
