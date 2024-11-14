// JS soubor
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".datepicker").forEach((element) => {
        const range = element.getAttribute("data-range") === "true";
        const minDate = element.getAttribute("data-min-date") || null;
        const maxDate = element.getAttribute("data-max-date") || null;
        const startDate = element.getAttribute("data-start-date") || null;
        const endDate = element.getAttribute("data-end-date") || null;

        const pickerConfig = {
            element: element,
            css: [
                "https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.css",
                'https://design-system.test/components/input/date/dist/style.css',
            ],
            zIndex: 10,
            lang: 'cs',
            autoApply: false,
            
            locale: {
                nextMonth: '<svg class="d-block" width="24" height="24"><use href="/dist/images/icons-sprite.svg#nav-arrow-right"></svg>',
                previousMonth: '<svg class="d-block" width="24" height="24"><use href="/dist/images/icons-sprite.svg#nav-arrow-left"></svg>',
                cancel: 'Zrušit',
                apply: 'Nastavit'
                },
            plugins: ["RangePlugin", "LockPlugin"],
            RangePlugin: {
                "repick": true
            },
            plugins: ['LockPlugin'],
            LockPlugin: {
            //  minDate: new Date(),
            },
        };

        // console.log( minDate, maxDate, startDate, endDate); ;
        if (minDate) pickerConfig.minDate = minDate;
        if (maxDate) pickerConfig.maxDate = maxDate;
        if (minDate) pickerConfig.LockPlugin.minDate = minDate;
        if (maxDate) pickerConfig.LockPlugin.maxDate = maxDate;
        if (startDate) pickerConfig.RangePlugin.startDate = startDate;
        if (startDate) pickerConfig.startDate = startDate;
        if (range && endDate) pickerConfig.RangePlugin.endDate = endDate;

        console.log( pickerConfig )
        new easepick.create(pickerConfig);
    });
});
