@foreach($legalCases as $legalCase)


<div x-data="{ openTab: null }">
                <!-- Accordion Item 3 -->
    <div class="border rounded mb-3">
                <!-- Accordion Header 3 -->
        <button @click="openTab === 3 ? openTab = null : openTab = 3" class="w-full px-4 py-2 bg-gray-200 text-left">
            <div class="flex justify-between w-100">
                <p class="mt-2 mb-2 text-md font-medium text-gray-800 inline-block">
                    Firstname: {{ $legalCase->user->firstname }}
                </p>   
                <p class="mt-2 mb-2 text-md font-medium text-gray-800 inline-block">
                    Lastname: {{ $legalCase->user->lastname }}
                </p>    
                <p class="mt-2 mb-2 text-md font-medium text-gray-800 inline-block">
                    Date: {{ $legalCase->created_at->format('Y-m-d') }}
                </p> 
                <p class="mt-2 mb-2 text-md font-medium text-gray-800 inline-block">
                    <a href="#" class="bg-white rounded-full p-2 py-1 shadow-md">Details</a>
                </p>
            </div>
        </button>
                <!-- Accordion Content 3 -->
                <div x-show="openTab === 3" class="p-4">
                    <div class="w-90 p-4 py-6 bg-white shadow-lg rounded-2xl">
                        <div class="flex flex-col items-center justify-center">
                            <div class="relative w-24 h-24 bg-green-200 rounded-full">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 2304 1792" class="absolute w-8 h-8 text-green-700 transform -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1728 448l-384 704h768zm-1280 0l-384 704h768zm821-192q-14 40-45.5 71.5t-71.5 45.5v1291h608q14 0 23 9t9 23v64q0 14-9 23t-23 9h-1344q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h608v-1291q-40-14-71.5-45.5t-45.5-71.5h-491q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h491q21-57 70-92.5t111-35.5 111 35.5 70 92.5h491q14 0 23 9t9 23v64q0 14-9 23t-23 9h-491zm-181 16q33 0 56.5-23.5t23.5-56.5-23.5-56.5-56.5-23.5-56.5 23.5-23.5 56.5 23.5 56.5 56.5 23.5zm1088 880q0 73-46.5 131t-117.5 91-144.5 49.5-139.5 16.5-139.5-16.5-144.5-49.5-117.5-91-46.5-131q0-11 35-81t92-174.5 107-195.5 102-184 56-100q18-33 56-33t56 33q4 7 56 100t102 184 107 195.5 92 174.5 35 81zm-1280 0q0 73-46.5 131t-117.5 91-144.5 49.5-139.5 16.5-139.5-16.5-144.5-49.5-117.5-91-46.5-131q0-11 35-81t92-174.5 107-195.5 102-184 56-100q18-33 56-33t56 33q4 7 56 100t102 184 107 195.5 92 174.5 35 81z">
                                    </path>
                                </svg>
                            </div>
                            <p class="mt-4 mb-4 text-xl font-medium text-gray-800">
                                {{ $legalCase->title }}
                            </p>
                            <p class="mt-2 mb-2 text-md font-medium text-gray-800 p-0">
                                Type: {{$legalCase->caseType->name }}
                            </p>
                            <p class="mt-2 mb-2 text-md font-medium text-gray-800 p-0">
                                Status: {{$legalCase->status }}
                            </p>
                            <p class="px-2 text-xs text-center text-gray-400">
                                {{$legalCase->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </div>    
    @endforeach

    <div id="accordionFlushExample">
  <div
    class="rounded-none border border-e-0 border-s-0 border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-body-dark">
    <h2 class="mb-0" id="flush-headingOne">
      <button
        class="group relative flex w-full items-center rounded-none border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-body-dark dark:text-white [&:not([data-twe-collapse-collapsed])]:bg-white [&:not([data-twe-collapse-collapsed])]:text-primary [&:not([data-twe-collapse-collapsed])]:shadow-border-b dark:[&:not([data-twe-collapse-collapsed])]:bg-surface-dark dark:[&:not([data-twe-collapse-collapsed])]:text-primary dark:[&:not([data-twe-collapse-collapsed])]:shadow-white/10 "
        type="button"
        data-twe-collapse-init
        data-twe-target="#flush-collapseOne"
        aria-expanded="false"
        aria-controls="flush-collapseOne">
        Accordion Item #1
        <span
          class="-me-1 ms-auto h-5 w-5 shrink-0 rotate-[-180deg] transition-transform duration-200 ease-in-out group-data-[twe-collapse-collapsed]:me-0 group-data-[twe-collapse-collapsed]:rotate-0 motion-reduce:transition-none [&>svg]:h-6 [&>svg]:w-6">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
          </svg>
        </span>
      </button>
    </h2>
    <div
      id="flush-collapseOne"
      class="!visible border-0"
      data-twe-collapse-item
      data-twe-collapse-show
      aria-labelledby="flush-headingOne"
      data-twe-parent="#accordionFlushExample">
      <div class="px-5 py-4">
        Placeholder content for this accordion, which is intended to
        demonstrate the
        <code>.accordion-flush</code> class. This is the first item's
        accordion body.
      </div>
    </div>
  </div>
  <div
    class="rounded-none border border-e-0 border-s-0 border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-body-dark">
    <h2 class="mb-0" id="flush-headingTwo">
      <button
        class="group relative flex w-full items-center rounded-none border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-body-dark dark:text-white [&:not([data-twe-collapse-collapsed])]:bg-white [&:not([data-twe-collapse-collapsed])]:text-primary [&:not([data-twe-collapse-collapsed])]:shadow-border-b dark:[&:not([data-twe-collapse-collapsed])]:bg-surface-dark dark:[&:not([data-twe-collapse-collapsed])]:text-primary dark:[&:not([data-twe-collapse-collapsed])]:shadow-white/10 "
        type="button"
        data-twe-collapse-init
        data-twe-collapse-collapsed
        data-twe-target="#flush-collapseTwo"
        aria-expanded="false"
        aria-controls="flush-collapseTwo">
        Accordion Item #2
        <span
          class="-me-1 ms-auto h-5 w-5 shrink-0 rotate-[-180deg] transition-transform duration-200 ease-in-out group-data-[twe-collapse-collapsed]:me-0 group-data-[twe-collapse-collapsed]:rotate-0 motion-reduce:transition-none [&>svg]:h-6 [&>svg]:w-6">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
          </svg>
        </span>
      </button>
    </h2>
    <div
      id="flush-collapseTwo"
      class="!visible hidden border-0"
      data-twe-collapse-item
      aria-labelledby="flush-headingTwo"
      data-twe-parent="#accordionFlushExample">
      <div class="px-5 py-4">
        Placeholder content for this accordion, which is intended to
        demonstrate the
        <code>.accordion-flush</code> class. This is the second item's
        accordion body. Let's imagine this being filled with some actual
        content.
      </div>
    </div>
  </div>
  <div
    class="rounded-none border border-b-0 border-e-0 border-s-0 border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-body-dark">
    <h2 class="mb-0" id="flush-headingThree">
      <button
        class="group relative flex w-full items-center rounded-none border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-body-dark dark:text-white [&:not([data-twe-collapse-collapsed])]:bg-white [&:not([data-twe-collapse-collapsed])]:text-primary [&:not([data-twe-collapse-collapsed])]:shadow-border-b dark:[&:not([data-twe-collapse-collapsed])]:bg-surface-dark dark:[&:not([data-twe-collapse-collapsed])]:text-primary dark:[&:not([data-twe-collapse-collapsed])]:shadow-white/10 "
        type="button"
        data-twe-collapse-init
        data-twe-collapse-collapsed
        data-twe-target="#flush-collapseThree"
        aria-expanded="false"
        aria-controls="flush-collapseThree">
        Accordion Item #3
        <span
          class="-me-1 ms-auto h-5 w-5 shrink-0 rotate-[-180deg] transition-transform duration-200 ease-in-out group-data-[twe-collapse-collapsed]:me-0 group-data-[twe-collapse-collapsed]:rotate-0 motion-reduce:transition-none [&>svg]:h-6 [&>svg]:w-6">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
          </svg>
        </span>
      </button>
    </h2>
    <div
      id="flush-collapseThree"
      class="!visible hidden"
      data-twe-collapse-item
      aria-labelledby="flush-headingThree"
      data-twe-parent="#accordionFlushExample">
      <div class="px-5 py-4">
        Placeholder content for this accordion, which is intended to
        demonstrate the
        <code>.accordion-flush</code> class. This is the third item's
        accordion body. Nothing more exciting happening here in terms of
        content, but just filling up the space to make it look, at least
        at first glance, a bit more representative of how this would look
        in a real-world application.
      </div>
    </div>
  </div>
</div>
<script>
    // Initialization for ES Users
import {
  Collapse,
  initTWE,
} from "tw-elements";

initTWE({ Collapse });
</script>