<script setup>
import InputError from '@/Components/InputError.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';


defineProps({
    categories: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    isbn: "",
    title: "",
    author: "",
    category_id: "",
});

const createBook = () => {
    form.post(route("books.store"));
};



</script>
<template>

    <Head title="Add Book" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Add Book
            </h2>
        </template>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 bg-[#EDE8D0]">
            <div class="lg:grid lg:grid-cols-12 lg:gap-x-5 bg-[#EDE8D0]">
                <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-12 bg-[#EDE8D0]">
                    <form @submit.prevent="createBook">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                                <div>
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Book Information
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500">
                                        Use this form to insert a new book.
                                    </p>
                                </div>

                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">ISBN</label>
                                        <input 
                                        v-model="form.isbn"
                                        type="text" id="name"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        :class="{'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300': form.errors.isbn}"
                                        />
                                        <InputError
                                            :message="form.errors.isbn"
                                            class="mt-2"
                                        />
                                    </div>
                                    
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Title</label>
                                        <input 
                                        v-model="form.title"
                                        type="text" id="name"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300': form.errors.title}" />
                                            <InputError
                                            :message="form.errors.title"
                                            class="mt-2"
                                        />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Author</label>
                                        <input 
                                        v-model="form.author"
                                        type="text" id="name"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300': form.errors.author}"
                                            />
                                            <InputError
                                            :message="form.errors.author"
                                            class="mt-2"
                                        />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="section_id"
                                            class="block text-sm font-medium text-gray-700">Category</label>
                                        <select 
                                        v-model="form.category_id"
                                        id="section_id"
                                            class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            :class="{'text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300': form.errors.category_id}"
                                            >
                                            <option value="">
                                                Select a Category
                                            </option>
                                            <option v-for="item in categories.data"
                                            :key="item.id" 
                                            :value="item.id">
                                            {{ item.category }}
                                        </option>
                                        </select>
                                        <InputError
                                            :message="form.errors.category_id"
                                            class="mt-2"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <a href="#"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-4">
                                    Cancel
                                </a>
                                <button type="submit"
                                    class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>