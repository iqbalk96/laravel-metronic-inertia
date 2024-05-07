import { Modal } from 'bootstrap'

export function useModal(modalId) {
    return new Modal(modalId, {
        backdrop: 'static',
        keyboard: true,
        focus: false
    })
}
