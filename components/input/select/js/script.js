document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll('.custom-select').forEach(select => {
    const selectedOptions = select.querySelector('.selected-options');
    const searchInput = select.querySelector('.search-input');

    // Nastavení akcí pro kliknutí na vybranou oblast a pro vyhledávání
    selectedOptions.addEventListener('click', () => toggleOptions(select));
    searchInput.addEventListener('keyup', () => filterOptions(select));

    // Přednačtení vybraných hodnot a aktualizace placeholderu
    preloadSelectedOptions(select);
    updatePlaceholder(select);

    // Nastavení akce pro každý .option-item v selectu
    select.querySelectorAll('.option-item').forEach(option => {
      option.addEventListener('click', () => selectOption(option, select));
    });

    // Vlastní JS event pro vybrání hodnoty
    select.addEventListener("selectByValue", function (event) {
      const select_by_value = event.select_by_value;

      //TODO kód který checkne checkbox (selectne) položku která obsahuje "value" = select_by_value
    });

  });

  // Zavírá všechny otevřené selecty při kliknutí mimo
  document.addEventListener('click', (event) => {
    document.querySelectorAll('.custom-select').forEach(select => {
      if (!select.contains(event.target)) {
        const optionsContainer = select.querySelector('.options-container');
        if (!optionsContainer.classList.contains('hidden')) {
          optionsContainer.classList.add('hidden');
        }
      }
    });
  });
});

function toggleOptions(customSelect) {
  const container = customSelect.querySelector('.options-container');
  container.classList.toggle('hidden');
}

function selectOption(option, customSelect) {
  const selectedOptions = customSelect.querySelector('.selected-options');
  const multiSelect = customSelect.getAttribute('data-multi') === 'true';
  const searchSelect = customSelect.getAttribute('data-search') === 'true';
  const optionText = option.innerText;
  const checkbox = option.querySelector('.hidden-checkbox'); // Přístup k checkboxu nebo radio uvnitř .option-item

  if (multiSelect) {
    checkbox.checked = !checkbox.checked;

    if (checkbox.checked) {
      selectedOptions.innerText += ` ${optionText}`;
      option.classList.add('selected');
    } else {
      selectedOptions.innerText = selectedOptions.innerText.replace(optionText, '').trim();
      option.classList.remove('selected');
    }
  } else {
    customSelect.querySelectorAll('.hidden-checkbox').forEach(cb => cb.checked = false);
    checkbox.checked = true;
    selectedOptions.innerText = optionText;
    customSelect.querySelectorAll('.option-item').forEach(item => item.classList.remove('selected'));
    option.classList.add('selected');

    // Zavře single-select po výběru
    toggleOptions(customSelect);
  }

  updatePlaceholder(customSelect);
}

function preloadSelectedOptions(customSelect) {
  const selectedOptions = customSelect.querySelector('.selected-options');
  const preloadCheckboxes = customSelect.querySelectorAll('.hidden-checkbox:checked');

  preloadCheckboxes.forEach(checkbox => {
    const option = checkbox.closest('.option-item');
    const optionText = option.innerText;
    selectedOptions.innerText += ` ${optionText}`;
    option.classList.add('selected');
  });

  updatePlaceholder(customSelect);
}

function updatePlaceholder(customSelect) {
  const selectedOptions = customSelect.querySelector('.selected-options');
  const placeholderText = customSelect.getAttribute('data-placeholder') || 'Vyberte...';

  if (selectedOptions.innerText.trim() === '' || selectedOptions.innerText.trim() === placeholderText) {
    selectedOptions.innerText = placeholderText;
  } else {
    if (selectedOptions.innerText.includes(placeholderText)) {
      selectedOptions.innerText = selectedOptions.innerText.replace(placeholderText, '').trim();
    }
  }
}

function removeDiacritics(text) {
  return text.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
}

function filterOptions(customSelect) {
  const input = removeDiacritics(customSelect.querySelector('.search-input').value.toLowerCase());
  const options = customSelect.querySelectorAll('.option-item');

  options.forEach(option => {
    const text = removeDiacritics(option.innerText.toLowerCase());
    option.style.display = text.includes(input) ? '' : 'none';
  });
}
