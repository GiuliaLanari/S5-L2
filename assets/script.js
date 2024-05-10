const languageForm = document.querySelector("#form-language");
const languageSelect = document.querySelector("#select-language");

languageSelect.addEventListener("change", function (e) {
  e.preventDefault();
  languageForm.submit();
});
