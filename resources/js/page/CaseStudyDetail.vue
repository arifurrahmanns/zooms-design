<script>
export default {
    data() {
        return {
            icons : [
                { title: "facebook" , image: "/images/case/facebook.png" },
                { title: "linkedIn" , image: "/images/case/linkedIn.png" },
                { title: "google" , image: "/images/case/google.png" },
            ],
        }
    },
}
</script>
<template>
    <div class="bg-[#E0F9FF] py-6 md:py-12 xl:py-16 lg:pr-4">
        <div class="max-w-7xl mx-auto px-4 relative md:flex lg:block flex-row-reverse">
            <div class="lg:absolute inline-block md:max-w-[50%] md:top-0 md:right-0 mb-6 md:mb-0">
                <img src="/images/case/banner.png" class="mx-auto md:max-w-full" alt="">
            </div>
            <div class="lg:max-w-[50%] md:pr-10 flex justify-center flex-col">
                <div class="inline-block xl:max-w-[500px]">
                    <p class="font-bold text-lg text-[#5CD0EB] mb-2">Case Study</p>
                    <h2 class="text-2xl xl:text-4xl font-bold text-[#2B2F42] mb-4">how zooms help michelin cambodia on boosting visibility online</h2>
                </div>
                <div class="flex items-center mt-4">
                    <img src="/images/case/profile.png" class="w-20 xl:w-24" alt="">
                    <p class="ml-4 font-bold text-sm md:text-lg text-[#2B2F42]">So Chetra <span class="text-[#5CD0EB] ml-4">Author</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 mt-6 mb-16 grid grid-cols-1 md:grid-cols-2">
        <div class="flex items-center justify-between md:pr-10">
            <p class="text-[#2B2F42] font-bold text-sm xl:text-lg">Published 03/02/2022</p>
            <div class="flex items-center">
                <div v-for="icon in icons" class="mr-4 last:mr-0">
                    <img :src="icon.image" class="w-7 xl:w-10" :alt="icon.title">
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-lg md:text-xl lg:text-2xl font-bold text-[#2B2F42] mb-6">Founded in 2019</h2>
        <p class="text-[#505050] text-sm md:text-lg mb-12">
            By accessing and placing an order with , you confirm that you are in agreement with and bound by the terms of service contained in the Terms & Conditions outlined below . These terms apply to the entire website and any email or other type of communication between you and Under no circumstances shall team be liable for any direct , indirect , special , incidental or consequential damages , including , but not limited to , loss of data or profit, arising out of the use , or the inability to use , the materials on this site , even if team or an authorized representative has been advised of the possibility of such damages If your use of materials from this site results in the need for servicing , repair or correction of equipment or data , you assume any costs thereof will not be responsible for any outcome that may occur during the course of usage of our resources . We reserve the rights to change prices and revise the resources usage policy in any moment
        </p>
        <h2 class="text-lg md:text-xl lg:text-2xl font-bold text-[#2B2F42] mb-6">Founded in 2019</h2>
        <p class="text-[#505050] text-sm md:text-lg mb-6">
            Zooms Design grants you a revocable, non-exclusive non – transferable, limited license to download , install and use our service strictly in accordance with the terms of this Agreement .
        </p>
        <p class="text-[#505050] text-sm md:text-lg">These Terms & Conditions are a contract between you and Zooms Design ( referred to in these Terms & Conditions as ” Zooms</p>
        <p class="text-[#505050] text-sm md:text-lg mb-6">
            Design “, ” us “, ” we ” or ” our” ), the provider of the Zooms Design website and the services accessible from the Zooms Design website (which are collectively referred to in these Terms & Conditions as the “Zooms Design Service )
        </p>
        <p class="text-[#505050] text-sm md:text-lg mb-12">
            You are agreeing to be bound by these Terms & Conditions . If you do not agree to these Terms & Conditions , please do not use the Service . In these Terms & Conditions , “you ” refers both to you as an individual and to the entity you represent . If you violate any of these Terms & Conditions we reserve the right to cancel your account or block access to your account without notice .
        </p>
        <img src="/images/case/content-1.png" class="mx-auto max-w-[50%] mb-4" alt="">
        <h2 class="text-lg md:text-xl lg:text-2xl font-bold text-[#2B2F42] mb-6">Founded in 2019</h2>
        <p class="text-[#505050] text-sm md:text-lg">
            By accessing and placing an order with , you confirm that you are in agreement with and bound by the terms of service contained in the Terms & Conditions outlined below . These terms apply to the entire website and any email or other type of communication between you and Under no circumstances shall team be liable for any direct , indirect , special , incidental or consequential damages , including , but not limited to , loss of data or profit, arising out of the use , or the inability to use , the materials on this site , even if team or an authorized representative has been advised of the possibility of such damages If your use of materials from this site results in the need for servicing , repair or correction of equipment or data , you assume any costs thereof will not be responsible for any outcome that may occur during the course of usage of our resources . We reserve the rights to change prices and revise the resources usage policy in any moment
        </p>
    </div>
</template>