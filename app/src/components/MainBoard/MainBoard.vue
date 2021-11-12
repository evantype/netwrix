<template>
    <div class="MainBoard">
        <div class="MainBoard-container">
            <h1>Netwrix Partner Locator</h1>
            <h4>Hundreds of Netwrix partners around the world are standing by to help you. <br/>With our Partner Locator
                you
                can easily find the list of authorized partners in your area.</h4>
            <form action="/" method="get" @submit.prevent.stop>
                <div class="MainBoard-search">
                    <label for="input-search" v-show="false">Input search</label>
                    <input type="text" :placeholder="searchPlaceholder.value" id="input-search" v-model="search"
                           @change="searchPartners">
                    <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.2857 6.71429C10.2857 8.91964 8.49107 10.7143 6.28571 10.7143C4.08036 10.7143 2.28571 8.91964 2.28571 6.71429C2.28571 4.50893 4.08036 2.71428 6.28571 2.71428C8.49107 2.71428 10.2857 4.50893 10.2857 6.71429ZM14.8571 14.1429C14.8571 13.8393 14.7321 13.5446 14.5268 13.3393L11.4643 10.2768C12.1875 9.23214 12.5714 7.98214 12.5714 6.71429C12.5714 3.24107 9.75893 0.428571 6.28571 0.428571C2.8125 0.428571 0 3.24107 0 6.71429C0 10.1875 2.8125 13 6.28571 13C7.55357 13 8.80357 12.6161 9.84822 11.8929L12.9107 14.9464C13.1161 15.1607 13.4107 15.2857 13.7143 15.2857C14.3393 15.2857 14.8571 14.7679 14.8571 14.1429Z"
                            fill="#0068DA"/>
                    </svg>
                </div>
                <div class="MainBoard-input_row">
                    <Select2
                        v-model="statusValue"
                        :options="statuses"
                        class="MainBoard-input_select MainBoard-input_type"
                        :settings="typeSettings"
                        @change="statusChange($event)"/>
                    <div class="MainBoard-input_twins">
                        <Select2
                            v-model="countryValue"
                            :options="countries"
                            class="MainBoard-input_select MainBoard-input_type"
                            :settings="countrySettings"/>
                        <Select2
                            v-model="stateValue"
                            :options="states"
                            class="MainBoard-input_select MainBoard-input_type"
                            :settings="stateSettings"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import './_MainBoard.scss';
import Select2 from 'v-select2-component';
import axios from 'axios';
import _ from 'lodash';

export default {
    name: 'MainBoard',
    props: {
        statuses: [],
    },
    components: {
        Select2,
    },
    data() {
        return {
            countries: [],
            states: [],
            statusValue: '',
            countryValue: '',
            stateValue: '',
            search: '',
            typeSettings: {
                closeOnSelect: true,
                placeholder: 'Type',
                width: '100%',
            },
            stateSettings: {
                closeOnSelect: true,
                placeholder: 'State',
                width: '100%',
            },
            countrySettings: {
                closeOnSelect: true,
                placeholder: 'Country',
                width: '100%',
            },
            searchPlaceholder: {
                desktop: 'Search by company name or adress..',
                mobile: 'Search',
                value: ''
            },

        };
    },
    methods: {
        statusChange(val) {
            this.$emit('statusChange', val);
        },
        mySelectEvent({id, text}) {
            console.log({id, text});
        },
        getAllParams() {
            axios.get('https://127.0.0.1:8000/board_params').then((response) => {
                const self = this;
                self.$emit('loader', true);

                let countries = [];
                let states = [];

                _.forEach(response.data.countries, (country) => {
                    countries.push({
                        'id': country.shortName,
                        'text': country.name,
                    });
                });

                _.forEach(response.data.states, (state) => {
                    states.push({
                        'id': state.shortName,
                        'text': state.name,
                    });
                });

                self.countries = countries;
                self.states = states;

                setTimeout(() => {
                    self.$emit('loader', false);
                }, 1000);
            }).catch(function(error) {
                console.log(error);
                // todo что выводить?
            });
        },
        searchPartners(event) {
            if (event.target.value.length && event.target.value.length >= 1) {
                this.$emit('search', event.target.value);
            }
        },
        getPlaceholderForSearch() {
            this.searchPlaceholder.value = window.innerWidth > 767 ?
                this.searchPlaceholder.desktop :
                this.searchPlaceholder.mobile;
        },
    },
    mounted() {
        this.getAllParams();
        this.getPlaceholderForSearch();
    },
};
</script>
