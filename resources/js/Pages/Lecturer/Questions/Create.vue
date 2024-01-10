<template>
        <Head title="Dashboard"/>
    
        <AuthenticatedLayout>
            <template #header>
                Dashboard
                <div class="p-4 bg-white rounded-lg shadow-xs">
                    Create Question
                </div>
            
            </template>
            <div class="p-4 bg-white rounded-lg shadow-xs">
                
                <form @submit.prevent="submit">

                        <div class="form-content">
                    
                                <div>
                                        <InputLabel for="question" value="Question" />
                                        
                                        <input id="question" class="block mt-1 w-full" type="text" v-model="form.question" required autofocus autocomplete="name" />
                                </div>
                                <div>
                                        <InputLabel for="answer1" value="Option 1" />
                                        <div class="flex items-center gap-2">
                                                <input id="answer1" class="mt-1 w-[800px]" type="text" v-model="form.answer1" required autofocus autocomplete="answer" />
                                                <input type="radio" name="correctAnswer" v-model="form.correctAnswer" value="1" class="mt-1">
                                        </div>
                                </div>
                                <div>
                                        <InputLabel for="answer2" value="Option 2" />
                                        <div class="flex items-center gap-2">
                                                <input id="answer2" class="mt-1 w-[800px]" type="text" v-model="form.answer2" required autofocus autocomplete="answer" />
                                                <input type="radio" name="correctAnswer" v-model="form.correctAnswer" value="2" class="mt-1">
                                        </div>
                                </div>
                                <div>
                                        <InputLabel for="answer3" value="Option 3" />
                                        <div class="flex items-center gap-2">
                                                <input id="answer3" class="mt-1 w-[800px]" type="text" v-model="form.answer3" required autofocus autocomplete="answer" />
                                                <input type="radio" name="correctAnswer" v-model="form.correctAnswer" value="3" class="mt-1">
                                        </div>
                                </div>
                                <div>
                                        <InputLabel for="answer4" value="Option 4" />
                                        <div class="flex items-center gap-2">
                                                <input id="answer4" class="mt-1 w-[800px]" type="text" v-model="form.answer4" required autofocus autocomplete="answer" />
                                                <input type="radio" name="correctAnswer" v-model="form.correctAnswer" value="4" class="mt-1">
                                        </div>
                                </div>

                        </div>
                    
                    <div class="flex mt-4">
                            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Save Question
                            </PrimaryButton>
                    </div>
            </form>
            
            </div>
    
        </AuthenticatedLayout>
    </template>
    
    <script setup>
    
        import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
        import Swal from 'sweetalert2';
        import PrimaryButton from '@/Components/PrimaryButton.vue';
        import InputLabel from '@/Components/InputLabel.vue';
        import { Head, useForm } from '@inertiajs/vue3';
    
        const form = useForm({
            question: '',
            answer1: '',
            answer2: '',
            answer3: '',
            answer4: '',
            correctAnswer: ''
        });
        
        const submit = () => {
                // Add your logic here to save the question and answers
            const question = form.question;
            const answers = [
                form.answer1,
                form.answer2,
                form.answer3,
                form.answer4
            ];
            const correctAnswer = form.correctAnswer;

            // Example code to show a success message
            Swal.fire({
                title: "Success!",
                text: "Question created successfully!",
                icon: "success",
            });
        
        };
    
</script>
