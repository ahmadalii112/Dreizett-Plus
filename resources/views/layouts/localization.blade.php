<div class="md:col-span-4 ">
    <label class="relative inline-block w-10 h-6 mt-2 mr-3">
        <input type="checkbox" class="toggleLang absolute w-0 h-0 opacity-0" {{ app()->getLocale() == 'de' ? 'checked' : '' }}>
        <span class="text-sm text-gray-500 hover:text-gray-700  absolute top-1/2 transform -translate-y-1/2 ml-8 cursor-pointer uppercase">{{ app()->getLocale() }}</span>
    </label>
</div>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        var toggleLang = document.querySelector(".toggleLang");
        var slider = document.querySelector(".slider");

        toggleLang.addEventListener("change", function() {
            var selectedLocale = toggleLang.checked ? 'de' : 'en';
            var currentLocale = "{{ app()->getLocale() }}";

            // Only redirect if the selected locale is different from the current locale
            if (selectedLocale !== currentLocale) {
                window.location.href = "{{ route('change.language') }}?lang=" + selectedLocale;
            }
        });

        slider.style.transform = toggleLang.checked ? "translate-x-6" : "translate-x-0";
    });
</script>