document.addEventListener('DOMContentLoaded', function() {
	const rangeElements = document.querySelectorAll('.input-range');
	
	rangeElements.forEach(function(rangeElement) {
		initializeRangeInput(rangeElement);
	});
	
	function initializeRangeInput(rangeElement) {
		const hiddenInput = rangeElement.querySelector('input[type="hidden"]');
		const valueDisplay = rangeElement.querySelector('.input-range__value');
		const plusIndicator = rangeElement.querySelector('.input-range__plus');
		const plusButton = rangeElement.querySelector('.input-range__button-plus');
		const minusButton = rangeElement.querySelector('.input-range__button-minus');
		
		// Get data attributes
		const min = parseFloat(rangeElement.getAttribute('data-min')) || 0;
		const max = parseFloat(rangeElement.getAttribute('data-max')) || 100;
		const step = parseFloat(rangeElement.getAttribute('data-step')) || 1;
		const initialValue = parseFloat(rangeElement.getAttribute('data-initial-value')) || 0;
		
		// Set initial values
		let currentValue = initialValue;
		updateValue(currentValue);
		
		// Add event listeners
		plusButton.addEventListener('click', function(event) {
			event.preventDefault();
			const newValue = Math.min(currentValue + step, max);
			if (newValue !== currentValue) {
				currentValue = newValue;
				updateValue(currentValue);
				triggerInputEvent();
			}
		});
		
		minusButton.addEventListener('click', function(event) {
			event.preventDefault();
			const newValue = Math.max(currentValue - step, min);
			if (newValue !== currentValue) {
				currentValue = newValue;
				updateValue(currentValue);
				triggerInputEvent();
			}
		});
		
		function updateValue(value) {
			// Format the value to remove unnecessary decimal places
			const formattedValue = value % 1 === 0 ? value.toString() : value.toFixed(2).replace(/\.?0+$/, '');
			
			if (hiddenInput) {
				hiddenInput.value = formattedValue;
			}
			if (valueDisplay) {
				valueDisplay.textContent = formattedValue;
			}
			
			// Update the plus indicator based on current value sign
			if (plusIndicator) {
				if (value < 0) {
					plusIndicator.textContent = '-';
				} else if (value > 0) {
					plusIndicator.textContent = '+';
				} else {
					plusIndicator.textContent = '';
				}
			}
			
			// Add/remove disabled class based on limits
			if (minusButton) {
				if (value <= min) {
					minusButton.classList.add('disabled');
				} else {
					minusButton.classList.remove('disabled');
				}
			}
			
			if (plusButton) {
				if (value >= max) {
					plusButton.classList.add('disabled');
				} else {
					plusButton.classList.remove('disabled');
				}
			}
		}
		
		function triggerInputEvent() {
			if (hiddenInput) {
				const inputEvent = new Event('input', { bubbles: true });
				hiddenInput.dispatchEvent(inputEvent);
				
				const changeEvent = new Event('change', { bubbles: true });
				hiddenInput.dispatchEvent(changeEvent);
			}
		}
	}
});

//# sourceMappingURL=script.js.map
