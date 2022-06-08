<script>
export default {
    data() {
        return {
            timeLeft: null,
        }
    },
    created() {
        const d = new Date();
        d.setHours(2);
        d.setMinutes(21)
        d.setSeconds(0)
        this.timeLeft = d;

        let interval = setInterval(() => {
            this.timeLeft = new Date(this.timeLeft.getTime() - 1000)

            if (this.timeLeft.getHours() == 0
            && this.timeLeft.getMinutes() == 0
            && this.timeLeft.getSeconds() == 0) {
                clearInterval(interval)
            }
        }, 1000)
    }
}
</script>

<template>
    <div class="relative">
        <div class="top-0 left-0">
            <img src="/images/banner/discount.png" alt="I want to design" class="w-full object-cover">
            <div class="absolute top-[2%] md:top-[10%] lg:top-[20%] right-[10%] md:right-[20%] w-[40%] md:w-[30%] lg:w-[20%]">
                <h1 class="text-lg md:text-3xl lg:text-6xl font-bold md:mb-5">Save 40% Off</h1>
                <div class="mb-2 md:mb-5 text-[11px] md:text-base">
                    Broccoli roses, alway fresh and delicious. 100% Organic
                </div>
                <div class="grid grid-cols-3 gap-2 mb-2 md:mb-8">
                    <div class="border border-[#5CD0EB] rounded text-center md:p-2">
                        <div class="text-[#5CD0EB] font-bold md:text-2xl">{{ timeLeft.getHours() }}</div>
                        <div class="text-xs md:text-base">HOURS</div>
                    </div>
                    <div class="border border-[#5CD0EB] rounded text-center md:p-2">
                        <div class="text-[#5CD0EB] font-bold md:text-2xl">{{ timeLeft.getMinutes() }}</div>
                        <div class="text-xs md:text-base">MINS</div>
                    </div>
                    <div class="border border-[#5CD0EB] rounded text-center md:p-2">
                        <div class="text-[#5CD0EB] font-bold md:text-2xl">{{ timeLeft.getSeconds() }}</div>
                        <div class="text-xs md:text-base">SECS</div>
                    </div>
                </div>
                <div>
                    <a href="/" class="bg-[#2B2F42] text-white font-bold rounded-lg px-2 py-1 md:px-10 md:py-3">ORDER NOW</a>
                </div>
            </div>
        </div>
    </div>
</template>