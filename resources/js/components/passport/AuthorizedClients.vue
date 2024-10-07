<template>
    <div>
        <div>
            <div class="flex items-center justify-between">
                <span class="text-2xl">Authorized Clients</span>
            </div>
            <table v-if="tokens.length > 0" class="mx-auto mb-20 mt-5 table w-full">
                <thead class="bg-indigo-500 text-white">
                    <tr>
                        <th scope="col" class="py-2">Name</th>
                        <th scope="col" class="py-2">Scopes</th>
                        <th scope="col" class="py-2">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(token, index) in tokens" :key="index">
                        <td class="border py-3 pl-3">{{ token.client.name }}</td>
                        <td class="border py-3 pl-3">
                            <span v-if="token.scopes.length > 0">{{ token.scopes.join(', ') }}</span>
                        </td>
                        <!-- Edit Button -->
                        <td class="border py-3 pl-3">
                            <a class="cursor-pointer text-red-500" @click="revoke(token)">Revoke</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div v-else role="alert" class="mb-20 pt-5">
                <div class="rounded-t bg-indigo-500 px-4 py-2 font-extrabold text-white">Attention needed.</div>
                <div class="rounded-b border border-t-0 border-indigo-300 bg-indigo-100 px-4 py-3 text-indigo-800">
                    <p>You Don't Have Any Authorized Clients Yet.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    /*
     * The component's data.
     */
    data() {
        return {
            tokens: [],
        };
    },

    /**
     * Prepare the component (Vue 1.x).
     */
    ready() {
        this.prepareComponent();
    },

    /**
     * Prepare the component (Vue 2.x).
     */
    mounted() {
        this.prepareComponent();
    },

    methods: {
        /**
         * Prepare the component (Vue 2.x).
         */
        prepareComponent() {
            this.getTokens();
        },

        /**
         * Get all of the authorized tokens for the user.
         */
        getTokens() {
            axios.get('/oauth/tokens').then((response) => {
                this.tokens = response.data;
            });
        },

        /**
         * Revoke the given token.
         */
        revoke(token) {
            axios.delete('/oauth/tokens/' + token.id).then((response) => {
                this.getTokens();
            });
        },
    },
};
</script>
