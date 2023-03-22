<script>
import { getFaqs } from '../../api/api'
export default {
    props: ['page'],
    data() {
        return {
            question_l: [],
            question_r: [],
        }
    },
    methods: {
        toggleQuestionL(id) {
            for (const [i, q] of this.question_l.entries()) {
                if (q.id == id) {
                    this.question_l[i].show_answer = !this.question_l[i].show_answer;
                    break;
                }
            }
        },
        toggleQuestionR(id) {
            for (const [i, q] of this.question_r.entries()) {
                if (q.id == id) {
                    this.question_r[i].show_answer = !this.question_r[i].show_answer;
                    break;
                }
            }
        },
        async fetchFaq() {
            console.log(this.page)
            const faqs = (await getFaqs({
                page: this.page
            })).data
            const faql = [];
            const faqr = [];
            faqs.forEach((faq, i) => {
                if (i < (faqs.length / 2)) {
                    faql.push(faq)
                } else {
                    faqr.push(faq)
                }
            });
            this.question_l = faql.map(it => {
                return {
                    id: it.id,
                    q: it.question,
                    answer: it.answer,
                    show_answer: false,
                }
            });
            this.question_r = faqr.map(it => {
                return {
                    id: it.id,
                    q: it.question,
                    answer: it.answer,
                    show_answer: false,
                }
            });
        }
    },
    watch: {
        async page() {

        }
    },
    async created() {
        await this.fetchFaq()
    },
}
</script>

<template>
    <div class="mx-auto py-8 px-4 xl:px-16">
        <div class="text-xl font-bold mb-8">Have question?</div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12">
            <div>
                <div v-for="q in question_l" :key="q.id">
                    <div class="border-b-2 border-[#ECECEE] py-3">
                        <div class="flex justify-between items-center">
                            <div class="flex">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 0C4.46711 0 0 4.46711 0 10C0 15.5329 4.46711 20 10 20C15.5329 20 20 15.5329 20 10C20 4.46711 15.5329 0 10 0ZM10 15.5555C9.33334 15.5555 8.80035 15.0226 8.80035 14.3559C8.80035 13.6892 9.33334 13.1562 10 13.1562C10.6667 13.1562 11.1996 13.6892 11.1996 14.3559C11.1996 15.0226 10.6667 15.5555 10 15.5555ZM12.7109 8.80045C12.5773 8.9784 12.4218 9.15635 12.2664 9.31174C12.1553 9.42285 12.0216 9.53395 11.8663 9.71191C11.6883 9.8673 11.5555 10.001 11.4444 10.1338C11.3333 10.2449 11.2222 10.356 11.1553 10.4445C10.9557 10.711 10.8663 11.0669 10.8888 11.4003V12.0895H9.15534V11.1564C9.13276 10.8456 9.1779 10.534 9.31071 10.2232C9.48866 9.93414 9.68831 9.66765 9.9548 9.42285L11.0659 8.31174C11.3107 8.04525 11.4218 7.71191 11.4218 7.356C11.4218 7.00009 11.2881 6.66676 11.0442 6.42285C10.7994 6.17805 10.4444 6.04525 10.0885 6.04525C9.73259 6.02268 9.37756 6.15635 9.11107 6.40115C8.84459 6.64595 8.6892 7.00098 8.66663 7.35689H6.80031C6.86715 6.53485 7.24476 5.75706 7.86716 5.2232C8.51125 4.69022 9.3116 4.42285 10.1563 4.44543C10.9566 4.40115 11.7561 4.66765 12.3785 5.17894C12.9566 5.66765 13.2448 6.37858 13.2448 7.26746C13.2223 7.82215 13.0443 8.37771 12.711 8.80045H12.7109Z" fill="#A1A6BF"/>
                                </svg>
                                <div class="ml-2">{{q.q}}</div>
                            </div>
                            <button @click="toggleQuestionL(q.id)" class="py-3">
                                <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 0.949988C12 1.14999 11.95 1.34999 11.8 1.44999L6.6 7.59999C6.45 7.79999 6.2 7.89999 6 7.89999C5.8 7.89999 5.55 7.79999 5.4 7.59999L0.199999 1.44999C-0.100001 1.04999 -0.0500007 0.549988 0.299999 0.249988C0.499999 0.0999878 0.649999 0.0499878 0.849999 0.0499878C1.05 0.0499878 1.3 0.149988 1.4 0.349988L6 5.74999L10.55 0.399988C10.7 0.249988 10.9 0.0999878 11.1 0.0999878C11.3 0.0999878 11.55 0.149988 11.7 0.299988C11.9 0.499988 12 0.699988 12 0.949988Z" fill="#A1A6BF"/>
                                </svg>
                            </button>
                        </div>
                        <div class="pb-2 text-[#505050] pl-[30px]" :class="{'hidden': !q.show_answer}">
                            {{q.answer}}
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div v-for="q in question_r" :key="q.id">
                    <div class="border-b-2 border-[#ECECEE] py-3">
                        <div class="flex justify-between items-center">
                            <div class="flex">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 0C4.46711 0 0 4.46711 0 10C0 15.5329 4.46711 20 10 20C15.5329 20 20 15.5329 20 10C20 4.46711 15.5329 0 10 0ZM10 15.5555C9.33334 15.5555 8.80035 15.0226 8.80035 14.3559C8.80035 13.6892 9.33334 13.1562 10 13.1562C10.6667 13.1562 11.1996 13.6892 11.1996 14.3559C11.1996 15.0226 10.6667 15.5555 10 15.5555ZM12.7109 8.80045C12.5773 8.9784 12.4218 9.15635 12.2664 9.31174C12.1553 9.42285 12.0216 9.53395 11.8663 9.71191C11.6883 9.8673 11.5555 10.001 11.4444 10.1338C11.3333 10.2449 11.2222 10.356 11.1553 10.4445C10.9557 10.711 10.8663 11.0669 10.8888 11.4003V12.0895H9.15534V11.1564C9.13276 10.8456 9.1779 10.534 9.31071 10.2232C9.48866 9.93414 9.68831 9.66765 9.9548 9.42285L11.0659 8.31174C11.3107 8.04525 11.4218 7.71191 11.4218 7.356C11.4218 7.00009 11.2881 6.66676 11.0442 6.42285C10.7994 6.17805 10.4444 6.04525 10.0885 6.04525C9.73259 6.02268 9.37756 6.15635 9.11107 6.40115C8.84459 6.64595 8.6892 7.00098 8.66663 7.35689H6.80031C6.86715 6.53485 7.24476 5.75706 7.86716 5.2232C8.51125 4.69022 9.3116 4.42285 10.1563 4.44543C10.9566 4.40115 11.7561 4.66765 12.3785 5.17894C12.9566 5.66765 13.2448 6.37858 13.2448 7.26746C13.2223 7.82215 13.0443 8.37771 12.711 8.80045H12.7109Z" fill="#A1A6BF"/>
                                </svg>
                                <div class="ml-2">{{q.q}}</div>
                            </div>
                            <button @click="toggleQuestionR(q.id)" class="py-3">
                                <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 0.949988C12 1.14999 11.95 1.34999 11.8 1.44999L6.6 7.59999C6.45 7.79999 6.2 7.89999 6 7.89999C5.8 7.89999 5.55 7.79999 5.4 7.59999L0.199999 1.44999C-0.100001 1.04999 -0.0500007 0.549988 0.299999 0.249988C0.499999 0.0999878 0.649999 0.0499878 0.849999 0.0499878C1.05 0.0499878 1.3 0.149988 1.4 0.349988L6 5.74999L10.55 0.399988C10.7 0.249988 10.9 0.0999878 11.1 0.0999878C11.3 0.0999878 11.55 0.149988 11.7 0.299988C11.9 0.499988 12 0.699988 12 0.949988Z" fill="#A1A6BF"/>
                                </svg>
                            </button>
                        </div>
                        <div class="pb-2 text-[#505050] pl-[30px]" :class="{'hidden': !q.show_answer}">
                            {{q.answer}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>