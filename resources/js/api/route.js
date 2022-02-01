import http from './https'

export function login(user) {
    return http.post('/login', user)
}