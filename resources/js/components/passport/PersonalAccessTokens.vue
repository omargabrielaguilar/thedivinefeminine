<template>
    <div>
        <div>
            <div class="flex items-center justify-between">
                <span class="text-2xl">Personal Tokens</span>

                <button
                    class="rounded bg-indigo-800 px-4 py-2 font-extrabold text-white hover:bg-indigo-500"
                    @click="showCreateTokenForm"
                >
                    Create New Token
                </button>
            </div>
            <!-- Personal Access Tokens -->
            <table v-if="tokens.length > 0" class="mx-auto mb-20 mt-5 table w-full">
                <thead class="bg-indigo-500 py-2 text-white">
                    <tr>
                        <td class="font-extraextrabold border py-2 pl-4 text-left">Name</td>
                        <td class="font-extraextrabold border py-2 pr-4 text-right">Actions</td>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(token, index) in tokens" :key="index">
                        <td scope="row" class="border py-3 pl-3 text-left">{{ token.name }}</td>
                        <td scope="row" class="border py-3 pr-3 text-right">
                            <a class="cursor-pointer text-red-500" @click="revoke(token)">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- No Tokens Notice -->
            <div v-else role="alert" class="mb-20 pt-5">
                <div class="font-extraextrabold rounded-t bg-indigo-500 px-4 py-2 text-white">Attention needed.</div>
                <div class="rounded-b border border-t-0 border-indigo-300 bg-indigo-100 px-4 py-3 text-indigo-800">
                    <p>You Don't Have Any Personal Tokens Yet. Please Create a New Personal Token.</p>
                </div>
            </div>
        </div>

        <!-- Create Token Modal -->
        <div v-if="showCreateModal">
            <div class="fixed inset-0 flex items-center">
                <div class="fixed inset-0 z-10 bg-black opacity-75" />

                <div class="relative z-20 m-8 mx-6 w-full md:mx-auto md:w-1/2 lg:w-1/3">
                    <div class="rounded-lg bg-white p-8 shadow-lg">
                        <div class="mb-6 flex justify-end">
                            <button @click="showCreateModal = false" class="flex items-center text-red-500">
                                <span class="mr-2">Close</span>
                                <svg viewBox="0 0 20 20" class="h-4 fill-current">
                                    <path
                                        d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"
                                    />
                                </svg>
                            </button>
                        </div>

                        <h1 class="text-center text-2xl text-indigo-800">Create Token</h1>

                        <form class="my-2 pb-2 pt-6" @submit.prevent="store">
                            <div class="mb-4">
                                <label class="mb-2 block text-sm font-extrabold" for="name">Name</label>
                                <input
                                    id="name"
                                    v-model="form.name"
                                    :class="{ 'border-red-500': form.errors.has('name') }"
                                    class="block h-full w-full appearance-none rounded border bg-gray-100 px-3 py-3 pl-9 pr-3 text-gray-700 outline-none focus:border-indigo-300"
                                    placeholder="Name Your Token"
                                    type="text"
                                    @keyup.enter="callMethod(store)"
                                />
                                <has-error :form="form" class="text-red-500" field="name" />
                            </div>

                            <div v-if="scopes.length > 0" class="mb-4 flex flex-wrap">
                                <label class="-ml-4 mb-0 w-full pb-2 pl-4 pr-4 pt-2 font-extrabold leading-normal"
                                    >Scopes</label
                                >

                                <div class="w-full pl-4 pr-4">
                                    <div v-for="(scope, index) in scopes" :key="index">
                                        <div class="checkbox">
                                            <label>
                                                <input
                                                    :checked="scopeIsAssigned(scope.id)"
                                                    type="checkbox"
                                                    @click="toggleScope(scope.id)"
                                                />
                                                {{ scope.id }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block flow-root">
                                <button
                                    class="float-right rounded bg-indigo-800 px-4 py-2 font-extrabold text-white hover:bg-indigo-500"
                                    type="button"
                                    @click="store"
                                >
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="showAccessTokenModal">
            <div class="fixed inset-0 flex items-center">
                <div class="fixed inset-0 z-10 bg-black opacity-75" />

                <div class="relative z-20 m-8 mx-6 w-full md:mx-auto md:w-1/2 lg:w-1/3">
                    <div class="rounded-lg bg-white p-8 shadow-lg">
                        <div class="mb-6 flex justify-end">
                            <button @click="showAccessTokenModal = false" class="flex items-center text-red-500">
                                <span class="mr-2">Close</span>
                                <svg viewBox="0 0 20 20" class="h-4 fill-current">
                                    <path
                                        d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"
                                    />
                                </svg>
                            </button>
                        </div>

                        <h1 class="pb-5 text-center text-2xl text-indigo-800">Personal Access Token</h1>
                        <p class="pb-5 text-justify text-lg tracking-tight text-gray-700">
                            Here is your new personal access token. This is the only time it will be shown so don't lose
                            it! You may now use this token to make API requests.
                        </p>
                        <textarea
                            v-model="accessToken"
                            class="mb-1 block w-full appearance-none rounded border border-gray-500 bg-white px-2 py-1 text-base leading-normal text-gray-700"
                            rows="10"
                        />
                    </div>
                </div>
            </div>
        </div>
        <!-- Access Token Modal -->
    </div>
</template>

<script>
import Form from 'vform';

export default {
    data() {
        return {
            accessToken: null,
            tokens: [],
            scopes: [],
            form: new Form({
                name: '',
                scopes: [],
            }),
            showCreateModal: false,
            showAccessTokenModal: false,
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
         * Prepare the component.
         */
        prepareComponent() {
            this.getTokens();
            this.getScopes();
        },

        /**
         * Get all of the personal access tokens for the user.
         */
        getTokens() {
            axios.get('/oauth/personal-access-tokens').then((response) => {
                this.tokens = response.data;
            });
        },

        /**
         * Get all of the available scopes.
         */
        getScopes() {
            axios.get('/oauth/scopes').then((response) => {
                this.scopes = response.data;
            });
        },

        /**
         * Show the form for creating new tokens.
         */
        showCreateTokenForm() {
            this.showCreateModal = true;
        },

        /**
         * Create a new personal access token.
         */
        store() {
            this.accessToken = null;

            this.form.post('/oauth/personal-access-tokens', this.form).then((response) => {
                this.form.name = '';
                this.form.scopes = [];

                this.tokens.push(response.data.token);
                this.showCreateModal = false;
                this.showAccessToken(response.data.accessToken);
            });
        },

        callMethod(method) {
            this.method;
        },

        /**
         * Toggle the given scope in the list of assigned scopes.
         */
        toggleScope(scope) {
            if (this.scopeIsAssigned(scope)) {
                this.form.scopes = _.reject(this.form.scopes, (s) => s == scope);
            } else {
                this.form.scopes.push(scope);
            }
        },

        /**
         * Determine if the given scope has been assigned to the token.
         */
        scopeIsAssigned(scope) {
            return _.indexOf(this.form.scopes, scope) >= 0;
        },

        /**
         * Show the given access token to the user.
         */
        showAccessToken(accessToken) {
            this.accessToken = accessToken;

            this.showAccessTokenModal = true;
        },

        /**
         * Revoke the given token.
         */
        revoke(token) {
            axios.delete('/oauth/personal-access-tokens/' + token.id).then((response) => {
                this.getTokens();
            });
        },
    },
};
</script>
