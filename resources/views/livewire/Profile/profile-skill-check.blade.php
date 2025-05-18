<div {{-- class="w-full flex flex-row p-5 border border-b-0 border-gray-200 dark:border-gray-700" --}} class="w-full flex flex-row p-5 border border-b- border-gray-200 dark:border-gray-700">
    <div class="flex flex-col w-1/2">

        <div class="mb-2">
            <x-input.input-svg wire:model.live.debounce.500ms="selectedItems.php" name_label="Php" for_label="tooltip-svg-php-skill-label">
                <x-svg.php data_tooltip_target="tooltip-svg-php-skill" class="mr-2" :workTooltip="false" />
            </x-input.input-svg>
        </div>

        <div class="mb-2">
            <x-input.input-svg wire:model.live.debounce.500ms="selectedItems.adobeafteraffects" name_label="Adobe After Affects" for_label="tooltip-svg-adobeafteraffects-skill-label">
                <x-svg.adobeafteraffects data_tooltip_target="tooltip-svg-adobeafteraffects-skill" class="mr-2"
                    :workTooltip="false" />
            </x-input.input-svg>
        </div>

        <div class="mb-2">
            <x-input.input-svg name_label="Adobe Illustrator" for_label="tooltip-svg-adobeillustrator-skill-label">
                <x-svg.adobeillustrator data_tooltip_target="tooltip-svg-adobeillustrator-skill" class="mr-2"
                    :workTooltip="false" />
            </x-input.input-svg>
        </div>

        <div class="mb-2">
            <x-input.input-svg name_label="Adobe Photoshop" for_label="tooltip-svg-adobephotoshop-skill-label">
                <x-svg.adobephotoshop data_tooltip_target="tooltip-svg-adobephotoshop-skill" class="mr-2"
                    :workTooltip="false" />
            </x-input.input-svg>
        </div>

        <div class="mb-2">
            <x-input.input-svg name_label="AdobeXd" for_label="tooltip-svg-adobexd-skill-label">
                <x-svg.adobexd data_tooltip_target="tooltip-svg-adobexd-skill" class="mr-2" :workTooltip="false" />
            </x-input.input-svg>
        </div>

        <div class="mb-2">
            <x-input.input-svg name_label="Javascript" for_label="tooltip-svg-javascript-skill-label">
                <x-svg.javascript data_tooltip_target="tooltip-svg-javascript-skill" class="mr-2"
                    :workTooltip="false" />
            </x-input.input-svg>
        </div>

        <div class="mb-2">
            <x-input.input-svg name_label="Linux" for_label="tooltip-svg-linux-skill-label">
                <x-svg.linux data_tooltip_target="tooltip-svg-linux-skill" class="mr-2" :workTooltip="false" />
            </x-input.input-svg>
        </div>

        <div class="mb-2">
            <x-input.input-svg name_label="Next Js" for_label="tooltip-svg-nextjs-skill-label">
                <x-svg.next-js data_tooltip_target="tooltip-svg-nextjs-skill" class="mr-2" :workTooltip="false" />
            </x-input.input-svg>
        </div>

        <div class="mb-2">
            <x-input.input-svg name_label="Sql" for_label="tooltip-svg-sql-skill-label">
                <x-svg.sql data_tooltip_target="tooltip-svg-sql-skill" class="mr-2" :workTooltip="false" />
            </x-input.input-svg>
        </div>


    </div>

    <div class="flex flex-col w-1/2 ml-3">

        <div class="mb-2">
            <x-input.input-svg name_label="Laravel">
                <x-svg.laravel data_tooltip_target="tooltip-svg-laravel-skill" class="mr-2" :workTooltip="false" />
            </x-input.input-svg>
        </div>


        <div class="mb-2">
            <x-input.input-svg name_label="Css" for_label="tooltip-svg-css-label">
                <x-svg.css data_tooltip_target="tooltip-svg-css-skill-label" class="mr-2" :workTooltip="false" />
            </x-input.input-svg>
        </div>

        <div class="mb-2">
            <x-input.input-svg name_label="Docker" for_label="tooltip-svg-docker-skill-label">
                <x-svg.docker data_tooltip_target="tooltip-svg-docker-skill" class="mr-2" :workTooltip="false" />
            </x-input.input-svg>
        </div>

        <div class="mb-2">
            <x-input.input-svg name_label="Figma" for_label="tooltip-svg-figma-skill-label">
                <x-svg.figma data_tooltip_target="tooltip-svg-figma-skill" class="mr-2" :workTooltip="false" />
            </x-input.input-svg>
        </div>

        <div class="mb-2">
            <x-input.input-svg name_label="Html" for_label="tooltip-svg-html-skill-label">
                <x-svg.html data_tooltip_target="tooltip-svg-html-skill" class="mr-2" :workTooltip="false" />
            </x-input.input-svg>
        </div>

        <div class="mb-2">
            <x-input.input-svg name_label="Postgres" for_label="tooltip-svg-postgres-skill-label">
                <x-svg.postgres data_tooltip_target="tooltip-svg-postgres-skill" class="mr-2" :workTooltip="false" />
            </x-input.input-svg>
        </div>

        <div class="mb-2">
            <x-input.input-svg name_label="React" for_label="tooltip-svg-react-skill-label">
                <x-svg.react data_tooltip_target="tooltip-svg-react-skill" class="mr-2" :workTooltip="false" />
            </x-input.input-svg>
        </div>

        <div class="mb-2">
            <x-input.input-svg name_label="Sketch" for_label="tooltip-svg-sketch-skill-label">
                <x-svg.sketch data_tooltip_target="tooltip-svg-sketch-skill" class="mr-2" :workTooltip="false" />
            </x-input.input-svg>
        </div>

        <div class="mb-2">
            <x-input.input-svg name_label="Typescript" for_label="tooltip-svg-typescript-skill-label">
                <x-svg.typescript data_tooltip_target="tooltip-svg-typescript-skill" class="mr-2"
                    :workTooltip="false" />
            </x-input.input-svg>
        </div>


    </div>
</div>
