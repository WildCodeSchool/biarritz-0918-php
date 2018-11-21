import axios from "axios";

const SESSION_KEY = "session_token";

export function postCredentials(credentials) {
  return axios
    .post("http://127.0.0.1:8000/api/login_check", credentials, {
      headers: {
        Accept: "application/json"
      }
    })
    .then(response => saveToken(response.data.token));
}

export function saveToken(token) {
  localStorage.setItem(SESSION_KEY, token);
}

export function getToken() {
  return localStorage.getItem(SESSION_KEY);
}

export function removeToken() {
  localStorage.removeItem(SESSION_KEY);
}
