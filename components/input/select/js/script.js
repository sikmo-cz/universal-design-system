document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll('.custom-select').forEach(select => {
    const selectedOptions = select.querySelector('.selected-options');
    const searchInput = select.querySelector('.search-input');

    // Vazba containeru k customSelect
    const container = select.querySelector('.input-select__options-container');
    container.customSelect = select;

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

    // Vlastní JS trigger event pro vybrání hodnoty
    select.closest(".input-select").addEventListener("ds-select-by-value", function (event) {
      const select_by_value = event.detail.value;

      select.querySelectorAll('.option-item').forEach(option => {
        if (option.querySelector(".hidden-checkbox").value === select_by_value) {
          selectOption(option, select);
        }
      });
  
    });

  });

  // Zavírá všechny otevřené selecty při kliknutí mimo
  document.addEventListener('click', (event) => {
    document.querySelectorAll('.input-select__options-container').forEach(container => {
      if (!container.customSelect.contains(event.target) && !container.contains(event.target)) {
        toggleOptions(container.customSelect, true);
      }
    });
  });
});

function toggleOptions(customSelect, forceClose = false) {
  const containers = document.querySelectorAll('.input-select__options-container');

  //find customSelect in container.customSelect
  const container = Array.from(containers).find(element => element.customSelect === customSelect);
  if (!container) {
    return;
  }

  if (container.classList.contains('hidden') && !forceClose) {
    document.body.appendChild(container);

    const rect = customSelect.getBoundingClientRect();
    
    container.style.left = `${rect.left + window.scrollX}px`;
    container.style.top = `${rect.bottom + window.scrollY}px`;

    container.classList.remove('hidden');
  } else {
    customSelect.appendChild(container);
    container.classList.add('hidden');
  }
}

function selectOption(option, customSelect) {
  const containers = document.querySelectorAll('.input-select__options-container');

  //find customSelect in container.customSelect
  const container = Array.from(containers).find(element => element.customSelect === customSelect);
  if (!container) {
    return;
  }

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
    container.querySelectorAll('.hidden-checkbox').forEach(cb => cb.checked = false);
    checkbox.checked = true;
    selectedOptions.innerText = optionText;
    container.querySelectorAll('.option-item').forEach(item => item.classList.remove('selected'));
    option.classList.add('selected');

    // Trigger the custom event "ds-value-change"
    const event = new CustomEvent("ds-value-change", {
      detail: {
        name: checkbox.name,
        value: checkbox.value,
        data: checkbox.dataset,
      }
    });
    customSelect.closest(".input-select").dispatchEvent(event);

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
  const containers = document.querySelectorAll('.input-select__options-container');

  //find customSelect in container.customSelect
  const container = Array.from(containers).find(element => element.customSelect === customSelect);
  if (!container) {
    return;
  }

  const input = removeDiacritics(container.querySelector('.search-input').value.toLowerCase());
  const options = container.querySelectorAll('.option-item');

  options.forEach(option => {
    const text = removeDiacritics(option.innerText.toLowerCase());
    option.style.display = text.includes(input) ? '' : 'none';
  });
}
