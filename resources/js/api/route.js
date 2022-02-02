import http from './https'

export function login(user) {
    return http.post('/login', user)
}

export function getUsers(data) {
    return http.get('/user', { params: data })
}

export function getCars(data) {
    return http.get('/car', { params: data })
}

export function getCarAvailability(data) {
    return http.get('/car/availability', { params: data })
}