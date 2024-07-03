<div class="flex items-center justify-between bg-highlight">
    <div
        class="relative cursor-pointer flex justify-center items-center duration-300 ease-in-out rounded-[50%] magnetic-link"
        x-bind:class="{ 'active': menuActive }"
        @click="menuActive = !menuActive">
        <div class="flex justify-center w-5 h-5 pt-px rounded-[50%] magnetic-object burger">
                    <span
                        class="after:absolute before:absolute relative mt-[7px] mb-0 mx-0 before:top-[-7px] after:top-[7px]"
                        x-bind:class="{'rotate-45 before:translate-x-0 before:translate-y-[7px] before:-rotate-90 after:translate-x-0 after:translate-y-[-7px] after:-rotate-90': menuActive}"></span>
        </div>
    </div>
</div>
