import { form } from './Login.vue';

export const submit = () => {
form.post(route('login'), {
_token: csrf_token(),
onFinish: () => form.reset('password'),
});
};
