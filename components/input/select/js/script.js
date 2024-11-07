let multiSelect = true; // Nastavte false pro jedno vybrání

function toggleOptions() {
  document.querySelector('.options-container').classList.toggle('hidden');
}

function selectOption(element) {
  const selectedOptions = document.querySelector('.selected-options');
  const optionText = element.innerText;
  const checkbox = element.previousElementSibling; // Přístup k checkboxu

  if (multiSelect) {
    checkbox.checked = !checkbox.checked; // Přepněte stav checkboxu

    if (checkbox.checked) {
      // Přidejte vybranou položku do textu
      selectedOptions.innerText += ` ${optionText}`;
      element.classList.add('selected');
    } else {
      // Odeberte položku z textu
      selectedOptions.innerText = selectedOptions.innerText.replace(optionText, '').trim();
      element.classList.remove('selected');
    }
  } else {
    // Pokud není multiSelect, proveďte jednorázový výběr
    document.querySelectorAll('.hidden-checkbox').forEach(cb => cb.checked = false); // Zrušte všechny
    checkbox.checked = true; // Nastavte aktuální checkbox
    selectedOptions.innerText = optionText; // Nastavte text na vybranou položku
    element.classList.add('selected');
    toggleOptions();
  }
}

function filterOptions() {
  const input = document.querySelector('.search-input').value.toLowerCase();
  const options = document.querySelectorAll('.option-item');

  options.forEach(option => {
    const text = option.innerText.toLowerCase();
    option.style.display = text.includes(input) ? '' : 'none';
  });
}
