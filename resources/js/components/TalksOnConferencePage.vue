<template>
    <div>
        <div class="mt-4 text-gray-500">Accepted to speak at this conference:</div>
        <ul class="list-none pl-0">
            <li v-for="talk in talksAccepted" v-cloak>
                <a :href="talk.url" class="hover:text-indigo-500">{{ talk.title }}</a>
                <a class="inline-flex" @click.prevent="undoAcceptance(talk)">
                    <div
                        class="ml-2 flex w-6 cursor-pointer items-center rounded border border-indigo-500 bg-white p-1 text-center text-indigo-800"
                    >
                        <loading-spinner
                            v-show="talk.loading"
                            class="mr-1 h-4 w-4 border-indigo-300 text-indigo-800"
                        ></loading-spinner>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"
                                class="inline fill-current"
                            />
                        </svg>
                    </div>
                </a>
            </li>
            <li v-if="talksAccepted.length === 0" v-cloak>None</li>
        </ul>

        <div class="mt-4 text-gray-500">Talks rejected from this conference:</div>
        <ul class="list-none pl-0">
            <li v-for="talk in talksRejected" v-cloak>
                <a :href="talk.url" class="hover:text-indigo-500">{{ talk.title }}</a>
                <a class="inline-flex" @click.prevent="undoRejection(talk)">
                    <div
                        class="ml-2 flex w-6 cursor-pointer items-center rounded border border-indigo-500 bg-white p-1 text-center text-indigo-800"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"
                                class="inline fill-current"
                            />
                        </svg>
                    </div>
                </a>
            </li>
            <li v-if="talksRejected.length === 0" v-cloak>None</li>
        </ul>

        <div class="mt-8 text-gray-500">Applied to speak at this conference:</div>
        <ul class="list-none pl-0">
            <li v-for="talk in talksSubmitted" v-cloak>
                <a :href="talk.url" class="hover:text-indigo-500">{{ talk.title }}</a>
                <a
                    class="ml-2 inline-flex w-6 cursor-pointer rounded border border-indigo-500 bg-white p-1 text-center text-indigo-800"
                    :href="`/submissions/${talk.submissionId}`"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M2 4v14h14v-6l2-2v10H0V2h10L8 4H2zm10.3-.3l4 4L8 16H4v-4l8.3-8.3zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"
                            class="inline fill-current"
                        />
                    </svg>
                </a>
                <a
                    class="ml-2 mt-4 inline-block cursor-pointer rounded border border-indigo-500 bg-white px-1 text-center text-indigo-800"
                    @click.prevent="unsubmit(talk)"
                >
                    <div class="flex items-center">
                        <loading-spinner
                            v-show="talk.loading"
                            class="mr-1 h-4 w-4 border-indigo-300 text-indigo-800"
                        ></loading-spinner>
                        Un-Submit
                    </div>
                </a>
            </li>
            <li v-if="talksSubmitted.length === 0" v-cloak>None</li>
        </ul>

        <div class="mt-8 text-gray-500">Not applied to speak at this conference:</div>
        <ul class="list-none pl-0">
            <li v-for="talk in talksNotSubmitted" v-cloak>
                <a :href="talk.url" class="hover:text-indigo-500">{{ talk.title }}</a>
                <a
                    class="mt-4 inline-block cursor-pointer rounded bg-indigo-500 px-1 text-center text-white"
                    @click.prevent="submit(talk)"
                >
                    <div class="flex items-center">
                        <loading-spinner
                            v-show="talk.loading"
                            class="mr-1 h-4 w-4 border-white text-indigo-800"
                        ></loading-spinner>
                        Mark Submitted
                    </div>
                </a>
            </li>
            <li v-if="talksNotSubmitted.length === 0" v-cloak>None</li>
        </ul>
    </div>
</template>

<script>
const SUBMITTED = 'submitted';
const UNSUBMITTED = 'unsubmitted';

import LoadingSpinner from './LoadingSpinner.vue';

export default {
    mounted: function () {
        Symposium.talks.forEach((talk) => (talk.loading = false));
        this.talks = Symposium.talks;
    },
    props: {
        conferenceId: {},
    },
    data: function () {
        return {
            talks: [],
        };
    },
    computed: {
        talksSubmitted: function () {
            return this.talks.filter(({ submitted, accepted, rejected }) => submitted && !accepted && !rejected);
        },
        talksAccepted: function () {
            return this.talks.filter(({ accepted }) => accepted);
        },
        talksRejected: function () {
            return this.talks.filter(({ rejected }) => rejected);
        },
        talksNotSubmitted: function () {
            return this.talks.filter(({ accepted, rejected, submitted }) => !accepted && !rejected && !submitted);
        },
    },
    methods: {
        updateSubmission: function (talk, status) {
            talk.loading = true;
            const data = {
                conferenceId: this.conferenceId,
                talkId: talk.id,
            };

            switch (status) {
                case SUBMITTED:
                    axios
                        .post('/submissions', data)
                        .then((response) => {
                            talk.submissionId = response.data.submissionId;
                            talk.submitted = true;
                            talk.loading = false;
                        })
                        .catch(() => {
                            alert('Something went wrong.');
                            talk.loading = false;
                        });
                    break;
                case UNSUBMITTED:
                    axios
                        .delete(`/submissions/${talk.submissionId}`)
                        .then(() => {
                            talk.submitted = false;
                            talk.submissionId = null;
                            talk.loading = false;
                        })
                        .catch(() => {
                            alert('Something went wrong.');
                            talk.loading = false;
                        });
                    break;
            }
        },
        submit: function (talk) {
            this.updateSubmission(talk, SUBMITTED);
        },
        unsubmit: function (talk) {
            this.updateSubmission(talk, UNSUBMITTED);
        },
        undoAcceptance: function (talk) {
            axios
                .delete(`/acceptances/${talk.acceptanceId}`, { submissionId: talk.submissionId })
                .then(() => {
                    talk.accepted = false;
                    talk.submitted = true;
                    talk.loading = false;
                })
                .catch(() => {
                    alert('Something went wrong.');
                    talk.loading = false;
                });
        },
        undoRejection: function (talk) {
            axios
                .delete(`/rejections/${talk.rejectionId}`, { submissionId: talk.submissionId })
                .then(() => {
                    talk.rejected = false;
                    talk.submitted = true;
                    talk.loading = false;
                })
                .catch(() => {
                    alert('Something went wrong.');
                    talk.loading = false;
                });
        },
    },
    components: {
        LoadingSpinner,
    },
};
</script>
