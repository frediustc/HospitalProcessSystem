/*
user -> (first time) -> Register [at nurses with : name age sex number] -> (go to) -> accounting -> doctors |-> lab
Nurse -> (each time user) -> take [weight temp tension symptom] & assign to doctor
Accounting (each time) -> insert paid money for a particular problem
doctor -> check is meeting and call patient -> check patient seen and send to the lab if necesssary

*/
/*db
users [id, fn, nb, sx, bd, ut, rd]
usertype[id, type]
consultation[id, weight, temp, symptom, doctorRecord, status, asignTo, prescription, viewdate, paid, patientid]

//nurse create the consultation and take the w, tens, temp and symptom describe by patient
then the patient go to pay for the consultation. by paying the status of the consultation go from pending to queue
and the patient is now in the queue to see the doctor. when the patient see the doctor the gives him prescription
and he add a not about the sickness of the patient and he can decide to send the patient to lab or not
if send the patien to lab the patient should come and base on the lab result the not will be ajusted and the
status of the consultation will be from queue to finish

labresult[id, name, result, condultationid]**
*/
