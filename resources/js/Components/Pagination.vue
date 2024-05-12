<script setup>
import { Link } from "@inertiajs/vue3";
const ChevronIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"><path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"/></svg>`;

const props = defineProps([
    "path",
    "next",
    "prev",
    "last",
    "total",
    "currentPage",
    "query",
]);

const generateHref = (path, num, startDate, endDate) => {
    let href = path || "";

    if (path && path.includes("?")) {
        href += "&";
    } else {
        href += "?";
    }

    if (num) {
        href += `page=${num}`;
    }

    if (startDate !== undefined && endDate !== undefined) {
        href += `&start_date=${startDate}&end_date=${endDate}`;
    }

    const queryParam = new URLSearchParams(window.location.search).get("query");
    if (queryParam) {
        href += `&query=${queryParam}`;
    }

    console.log(props.query);
    return href;
};
</script>

<template>
    <div
        class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6"
    >
        <div class="flex flex-1 justify-between sm:hidden">
            <Link
                preserve-scroll
                :href="prev"
                href="#"
                class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >Previous</Link
            >
            <Link
                preserve-scroll
                :href="next"
                href="#"
                class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >Next</Link
            >
        </div>
        <div
            class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between"
        >
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    {{ " " }}
                    <span class="font-medium">{{ currentPage }}</span>
                    {{ " " }}
                    to
                    {{ " " }}
                    <span class="font-medium">{{ last }}</span>
                    {{ " " }}
                    of
                    {{ " " }}
                    <span class="font-medium">{{ total }}</span>
                    {{ " " }}
                    results
                </p>
            </div>
            <div>
                <nav
                    class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                    aria-label="Pagination"
                >
                    <Link
                        preserve-scroll
                        :href="prev"
                        :class="
                            prev === null
                                ? ' bg-gray-300  cursor-default'
                                : ' text-gray-400 hover:bg-gray-50 '
                        "
                        class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                    >
                        <span class="sr-only">Previous</span>
                        <div
                            v-html="ChevronIcon"
                            class="h-5 w-5 rotate-90 flex justify-center"
                            aria-hidden="true"
                        ></div>
                    </Link>

                    <Link
                        :href="generateHref(path, 1, startDate, endDate, query)"
                        :class="
                            currentPage == 1
                                ? 'relative z-10 inline-flex items-center bg-blue-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'
                                : 'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0'
                        "
                        >{{ 1 }}</Link
                    >

                    <div
                        v-if="currentPage > 3"
                        :class="
                            false
                                ? 'relative z-10 inline-flex items-center bg-blue-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'
                                : 'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0'
                        "
                    >
                        ...
                    </div>
                    <Link
                        v-if="currentPage >= 3"
                        :href="
                            generateHref(
                                path,
                                currentPage - 1,
                                startDate,
                                endDate,
                                query
                            )
                        "
                        :class="
                            false
                                ? 'relative z-10 inline-flex items-center bg-blue-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'
                                : 'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0'
                        "
                        >{{ currentPage - 1 }}</Link
                    >
                    <Link
                        v-if="currentPage > 1 && last - currentPage > 0"
                        :href="
                            generateHref(
                                path,
                                currentPage,
                                startDate,
                                endDate,
                                query
                            )
                        "
                        :class="
                            currentPage == currentPage
                                ? 'relative z-10 inline-flex items-center bg-blue-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'
                                : 'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0'
                        "
                        >{{ currentPage }}</Link
                    >
                    <Link
                        v-if="last - currentPage > 1"
                        :href="
                            generateHref(
                                path,
                                currentPage + 1,
                                startDate,
                                endDate,
                                query
                            )
                        "
                        :class="
                            false
                                ? 'relative z-10 inline-flex items-center bg-blue-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'
                                : 'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0'
                        "
                        >{{ currentPage + 1 }}</Link
                    >
                    <div
                        v-if="last - currentPage > 2"
                        :class="
                            false
                                ? 'relative z-10 inline-flex items-center bg-blue-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'
                                : 'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0'
                        "
                    >
                        ...
                    </div>
                    <Link
                        v-if="last != 1"
                        :href="
                            generateHref(path, last, startDate, endDate, query)
                        "
                        :class="
                            currentPage == last
                                ? 'relative z-10 inline-flex items-center bg-blue-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'
                                : 'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0'
                        "
                        >{{ last }}</Link
                    >

                    <!-- <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span> -->
                    <Link
                        preserve-scroll
                        :href="next"
                        :class="
                            next === null
                                ? ' bg-gray-300 cursor-default'
                                : ' text-gray-400 hover:bg-gray-50 '
                        "
                        class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                    >
                        <span class="sr-only">Next</span>
                        <div
                            v-html="ChevronIcon"
                            class="h-5 w-5 -rotate-90 flex justify-center"
                            aria-hidden="true"
                        ></div>
                    </Link>
                </nav>
            </div>
        </div>
    </div>
</template>
