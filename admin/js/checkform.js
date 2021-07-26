
  const form = document.getElementById("form");
  const title = document.getElementById("title");
  const subtitle = document.getElementById("subtitle");
  const lieu = document.getElementById("lieu");
  const date = document.getElementById("date");
  const file = document.getElementById("file");
  const file2 = document.getElementById("file2");
  const file3 = document.getElementById("file3");
  const description = document.getElementById("description");


  //Show input error message

  function showError(input, message) {
    const formControl = input.parentElement;
    formControl.className = "form-control error";
    const small = formControl.querySelector("small");
    small.innerText = message;
  }

  //show success message

  function showSuccess(input) {
    const formControl = input.parentElement;
    formControl.className = "form-control success";
  }

  //check required fields

  function checkRequired(inputArr) {
    inputArr.forEach(function(input) {
      if (input.value.trim() === "") {
        showError(input, `${getFieldName(input)} Filed is required`);
      } else {
        showSuccess(input);
      }
    });
  }

  //get field name
  function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
  }

  //check length

  function checkLength(input, min, max) {
    if (input.value.length < min) {
      showError(
        input,
        `${getFieldName(input)} must be atleast ${min} characters`
      );
    } else if (input.value.length > max) {
      showError(
        input,
        `${getFieldName(input)} must be less than ${max} characters`
      );
    } else {
      showSuccess(input);
    }
  }



  //Event listeners
  form.addEventListener("submit", function(event) {

    event.preventDefault();
    let checkValue = checkRequired([title, subtitle, lieu, date, file, file2, file3, description]);
    let checkLengthTitle =  checkLength(title, 3, 45);
    let checkLengthDes = checkLength(description, 50, 800);

    if (checkValue && checkLengthTitle && checkLengthDes) {
      form.submit();
    } 
  });