<template>
    <div class="max-w-full md:max-w-6xl mx-auto my-3 md:px-8">
        <div class="relative block flex flex-col md:flex-row items-center">
            <div class="price-card price-card-default sm:my-5 sm:w-3/5 lg:w-1/3">
                <div class="price-card-container">
                    <div class="price-card-heading lg:px-6">
                        <h1>{{ left_plan.name }}</h1>
                        <h2><span>{{ left_plan.price }}</span> {{ left_plan.currency }}</h2>
                        <p>{{ left_plan.description }} Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minus cum repudiandae dolor doloribus labore, earum! Vero quisquam molestias itaque officiis explicabo, impedit veniam, assumenda animi ipsum aspernatur, optio earum!</p>
                    </div>
                    <div class="price-card-body">
                        <ul>
                            <li>
                                10% at Flexible Pass
                            </li>
                            <li>
                                10% at Flexible Pass
                            </li>
                            <li>
                                10% at Flexible Pass
                            </li>
                        </ul>
                    </div>
                    <div class="price-card-footer">
                        <a href="#" class="hover:bg-teal-500">
                            Join Now
                        </a>
                    </div>
                </div>
            </div>
            <div class="price-card price-card-primary sm:my-5 sm:w-2/3 lg:w-1/3">
                <div class="price-card-popular">
                    Most Popular
                </div>
                <div class="price-card-heading lg:px-6">
                    <h1>{{ main_plan.name }}</h1>
                    <h2><span>{{ main_plan.price }}</span> {{ main_plan.currency }}</h2>
                    <p>{{ main_plan.description }} Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, esse impedit a expedita sit beatae quaerat vero. Mollitia dolore aliquam officiis minus harum maxime optio enim quo. Beatae, impedit magni!</p>
                </div>
                <div class="price-card-body">
                    <ul>
                        <li>
                            10% at Flexible Pass
                        </li>
                        <li>
                            10% at Flexible Pass
                        </li>
                        <li>
                            10% at Flexible Pass
                        </li>
                    </ul>
                </div>
                <div class="price-card-footer">
                    <a href="#" class="hover:bg-teal-500">
                        Join Now
                    </a>
                </div>
            </div>
            <div class="price-card price-card-default sm:my-5 sm:w-3/5 lg:w-1/3">
                <div class="price-card-container">
                    <div class="price-card-heading lg:px-6">
                        <h1>{{ right_plan.name }}</h1>
                        <h2><span>{{ right_plan.price }}</span> {{ right_plan.currency }}</h2>
                        <p>{{ right_plan.description }} Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto nam deleniti voluptatem totam dolorem labore molestias similique quidem assumenda, non libero repellat officiis laboriosam laborum sapiente quisquam quia voluptas repudiandae.</p>
                    </div>
                    <div class="price-card-body">
                        <ul>
                            <li>
                                10% at Flexible Pass
                            </li>
                            <li>
                                10% at Flexible Pass
                            </li>
                            <li>
                                10% at Flexible Pass
                            </li>
                        </ul>
                    </div>
                    <div class="price-card-footer">
                        <a href="#" class="hover:bg-teal-500">
                            Join Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="block mx-auto">
            <p class="text-center text-gray-600">Looking for a one month plan? <a href="#">Join with {{ bottom_plan.price }} {{ bottom_plan.currency }}.</a></p>
        </div>
    </div>    
</template>


<script>
export default {
  props: {
    left_plan: {},
    right_plan: {},
    main_plan: {},
    bottom_plan: {}
  },
  mounted() {
    console.log('buy-plans component mounted.')
  }
}
</script>

<style>
    .price-card {
        @apply my-8 mx-4 relative rounded shadow;
    }
    .price-card-default {
        @apply w-11/12 max-w-sm z-0;
    }  
    .price-card-primary {
        @apply w-full max-w-md z-10 bg-white;
    }
    .price-card-popular {
        @apply text-sm leading-none rounded-t-lg bg-teal-400 text-white font-semibold uppercase py-4 text-center tracking-wide;
    }
    .price-card-heading {
        @apply block text-center max-w-sm mx-auto mt-2 text-black px-8;
    }
    .price-card-heading > h1 {
        @apply uppercase p-3 pb-0 tracking-wide;
    }
    .price-card-heading > h2 {
        @apply text-sm text-teal-400 pb-6;
    }
    .price-card-heading > h2 > span {
        @apply text-3xl; 
    }
    .price-card-heading > p {
        @apply text-gray-700 text-justify; 
    }
    .price-card-container {
        @apply bg-white text-black rounded-lg shadow-inner shadow-lg overflow-hidden;
    }
    .price-card-default > .price-card-container > .price-card-body {
        @apply flex mt-3 flex-wrap px-6;
    }
    .price-card-primary > .price-card-body {
        @apply flex items-center;
    }
    .price-card-body > ul {
        @apply mx-auto;
    }
    .price-card-body > ul > li {
        @apply text-gray-700;
    }
    .price-card-footer {
        @apply block flex items-center p-8 uppercase;
    }
    .price-card-footer > a {
        @apply mt-3 text-lg bg-teal-400 w-full text-white text-center px-6 py-3 block shadow-xl;
    }
</style>